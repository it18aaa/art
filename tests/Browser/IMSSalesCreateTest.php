<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use App\User;
use App\Sales;
use App\Customer;
use App\Artwork;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class IMSSalesCreateTest extends DuskTestCase
{
    public function testEditUser()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/');

            $customer = factory(Customer::class)->create();                
            $artworks = factory(Artwork::class, rand(3,8) )->create();
            
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
                ->assertSee($customer->postcode);

            $sale_id = $customer->sales()->latest()->first()->id;

          
            foreach($artworks as $artwork) {

                // calc position of our inserted artwork within the small art browser
                $position = Artwork::orderBy('name')->where('name', '<=', $artwork->name)->count();
                $artpage = floor( $position  / 10) + 1 ;

                $browser
                    ->visit(route('ims.sales.edit', $sale_id) . '?page='. $artpage)
                    ->click('#add-art-'. $artwork->id)
                    ;

            }


        });
    }

}
