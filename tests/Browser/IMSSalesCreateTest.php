<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use App\User;
use App\Sale;
use App\Customer;
use App\Artwork;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class IMSSalesCreateTest extends DuskTestCase
{
    public function testCreateSale()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/');

            $customer = factory(Customer::class)->create();                
            $artworks = factory(Artwork::class, rand(2,4) )->create();
            
            

            $browser
                ->loginAs(User::find(3))
                ->visit(route('ims.sales.create'));                

            //calculate the page where the customer is likely to be on
            $position = Customer::where('lastname', '<=', $customer->lastname)->count();
            $custpage = floor(($position - 1) /10) +1;

            // create an order for that customer
            $browser
                ->visit(route('ims.sales.create') . '?page=' . $custpage)
                ->assertSee($customer->firstname)
                ->assertSee($customer->lastname)
                ->click('#cust-'. $customer->id)
                ->assertSee($customer->firstname)
                ->assertSee($customer->lastname)
                ->assertSee($customer->address1)                
                ->assertSee($customer->title)
                ->assertSee($customer->postcode)
                ->assertSee('Order created');

            $sale_id = $customer->sales()->latest()->first()->id;

            foreach($artworks as $artwork) {

                // calc position of our inserted artwork within the small art browser
                $position = Artwork::orderBy('name')
                    ->where('sale_id',null)
                    ->where('name', '<=', $artwork->name)
                    ->count() - 1;

                $page = floor( $position  / 10) + 1  ;
                $browser
                    ->visit(route('ims.sales.edit', $sale_id) . '?page='. $page)
                    ->click('#add-art-'. $artwork->id);
            }

            // now remove them all
            foreach($artworks as $artwork) {
                $browser
                    ->click('#rem-art-'.$artwork->id);
            }

            // and re-add them
            foreach($artworks as $artwork) {

                // calc position of our inserted artwork within the small art browser
                $position = Artwork::orderBy('name')
                    ->where('sale_id',null)
                    ->where('name', '<=', $artwork->name)
                    ->count() - 1;
                $page = floor( $position  / 10) + 1  ;
                $browser
                    ->visit(route('ims.sales.edit', $sale_id) . '?page='. $page)
                    ->click('#add-art-'. $artwork->id);
            }

            foreach($artworks as $artwork)
            {
                $browser
                    ->assertSee($artwork->name)
                    ->assertSee($artwork->id)
                    ->assertSee(number_format($artwork->price, 2));
            }

            $browser
                ->press('Pay')
                ->assertSee('Customer has paid');

            $browser
                ->press('Complete order')
                ->assertDontSee('Items have not been delivered to Customer')
                ->assertSee('Complete');


            // clean up

            foreach($artworks as $artwork) {
                Artwork::destroy($artwork->id);
            }

            Sale::destroy($sale_id);
            Customer::destroy($customer->id);

            

        });
    }

}
