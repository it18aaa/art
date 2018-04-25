<?php

namespace Tests\Unit;

use App\Artwork;
use App\Customer;
use App\Sale;
use Illuminate\Http\Request;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class SaleTest extends TestCase
{
    private $itemCount;
    private $artworks;
    private $sale;
    private $customer;


    private function getTotal()
    {
        $total = 0;
        foreach($this->artworks as $artwork) 
        {
            $total += $artwork->price;        
        }
        return $total;

    }

    public function testCustomer()
    {   
        $customer = $this->sale->customer;
        $this->assertEquals($this->customer->id, $customer->id);
    }

    public function testArtworks()
    { 
        $artworks = $this->sale->artworks;
        foreach($artworks as $artwork)
        {
            $this->assertTrue($this->artworks->contains($artwork));
        }
    }

    public function testCalcTotalExVat()
    {
        $total = $this->getTotal();
        $this->assertEquals($total, $this->sale->calcTotalExVat());
    }

    public function testCalcVat()
    {
        $total = $this->getTotal();
        $vat = $total * 0.2;

        $this->assertEquals($vat, $this->sale->calcVat());
    }

    public function testCalcTotalIncVat()         
    {
        $total = $this->getTotal();
        $vat = $total * 0.2;
        $totalAndVat = $vat + $total;
        $this->assertEquals($totalAndVat, 
            $this->sale->calcTotalIncVat());
    }

    public function testItemCount()
    {
        $this->assertEquals($this->itemCount, 
            $this->sale->itemCount());

    }

    public function setUp()
    {
        parent::setUp();

        $this->itemCount = random_int(8,16);
        $this->artworks = factory(Artwork::class, $this->itemCount)->create();        
        $this->customer = factory(Customer::class)->create();
        $this->sale = new Sale();     
        $this->sale->save();

        foreach($this->artworks as $artwork)
        {
            $artwork->sale_id = $this->sale->id;
            $artwork->save();
        }

        $this->sale->customer_id = $this->customer->id;
        $this->sale->save();

    }

    public function tearDown()
    {
        
        foreach($this->artworks as $artwork)
        {
            Artwork::destroy($artwork->id);
        }
        Sale::destroy($this->sale->id);
        Customer::destroy($this->customer->id);

        parent::tearDown();
    }



}