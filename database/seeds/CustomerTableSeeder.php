<?php

use Illuminate\Database\Seeder;
use App\Customer;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create some customers
        for($index = 0; $index < 20; $index++) 
        {
            $customer = factory(Customer::class)->create();
        }
    }
}
