<?php

namespace Tests\Unit;

use App\Customer;
use App\Sale;
use Illuminate\Http\Request;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CustomerTest extends TestCase
{
    public function testSales()
    {

        // create world
        $customer = factory(Customer::class)->create();

        $noOfSales = random_int(7,18);
        $sales = array();
        for($a = 0; $a < $noOfSales; $a++) {
            array_push($sales, new Sale());
        }

        foreach($sales as $sale) {
            $sale->customer_id = $customer->id;
            $sale->save();            
        }
        
        // test all the sales are returned

        $testSales = $customer->sales;

        foreach($sales as $sale) {
            $this->assertTrue($testSales->contains($sale));
        }

        foreach($sales as $sale)         {
            Sale::destroy($sale->id);
        }
        Customer::destroy($customer->id);
    }

    public function testValidateAndSave()
    {
        $customer = factory(Customer::class)->make();

        $requestGood = new Request();
        $requestGood->setMethod('POST');
        $requestGood->request->add([
            'title' => $customer->title,
            'firstname' => $customer->firstname,
            'lastname' => $customer->lastname,
            'email' => $customer->email,
            'address1' => $customer->address1,
            'address2' => $customer->address2,
            'town' => $customer->town,
            'county' => $customer->county,
            'postcode' => $customer->postcode,
            'telephone' => $customer->telephone,
        ]);

        $this->cust = new Customer();

        $this->cust->validateAndSave($requestGood);

        $saved = Customer::where([
            'firstname' => $customer->firstname, 
            'lastname' => $customer->lastname
            ])->first();

        $this->assertEquals($customer->firstname, $saved->firstname);
        $this->assertEquals($customer->lastname, $saved->lastname);

        Customer::destroy($saved->id);
        Customer::destroy($this->cust->id);
    }

    public function setUp()
    {
        parent::setUp();
    }

    public function tearDown()
    {
        parent::tearDown();
    }
}
