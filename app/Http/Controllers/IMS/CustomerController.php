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
        $customer = new Customer();
        $customer->validateAndSave($request);

        return redirect()->route('ims.customers.index')
            ->with('info', $customer->firstname . " " .
                 $customer->lastname . " create.");
    }

    public function show(Customer $customer)
    {
        // not yet implemented
    }

    public function edit(Customer $customer)
    {
        return view('IMS.customers.create')
            ->with('customer', $customer);
    }

    public function update(Request $request, Customer $customer)
    {
        $customer->validateAndSave($request);

        return redirect()->route('ims.customers.index')
            ->with('info', $customer->firstname ." ".
                $customer->lastname . " updated.");
    }

    public function destroy(Customer $customer)
    {
        Customer::destroy($customer->id);
        return redirect()->back();
    }
}
