<?php

namespace App\Http\Controllers\IMS;

use App\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{

    public function index()
    {
        return view('IMS.customers.index')
            ->with('customers', Customer::paginate(15));;
    }

    public function create()
    {
         // show form
         return view('IMS.customers.create');
    }

    public function store(Request $request)
    {

    }

    public function show(Customer $customer)
    {

    }

    public function edit(Customer $customer)
    {
        return view('IMS.customers.create')
            ->with('customer', $customer);
    }

    public function update(Request $request, Customer $customer)
    {
        $customer->firstname = $request->firstname;
        $customer->lastname = $request->lastname;
        $customer->save();

        $name = $customer->firstname . " " . $customer->lastname;

        return redirect()->route('ims.customers.index')
            ->with('info', $name . ' updated');
    }

    public function destroy(Customer $customer)
    {

    }
}
