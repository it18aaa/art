<?php

namespace App\Http\Controllers\IMS;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Artwork;
use App\Customer;
use App\Sale;

class SaleController extends Controller
{

    public function index()
    {
        
        $countComplete = Sale::where('fulfilled',true)
                            ->count();
        $countPaid = Sale::where('fulfilled', false)
                        ->where('paid', true)
                        ->count();
        $countUnpaid = Sale::where('paid', false)
                            ->count();

        
        return view('IMS.sales.index')->with([
            'countComplete' => $countComplete,                
            'countPaid' => $countPaid,
            'countUnpaid' => $countUnpaid,                
        ]);
    }

    public function indexComplete() {

        //echo "index complete() "; die();

        $sales = Sale::where('fulfilled', true)
            ->orderBy('sale_date')
            ->paginate(10);

        return view('IMS.sales.indexSales')
            ->with([
                'sales'=> $sales,
                'title'=> 'Completed orders']);
    }

    public function indexUnpaid() {

        //echo "index unpaid "; die();
        $sales = Sale::where('paid', false)
            ->orderBy('sale_date')
            ->paginate(10);

        return view('IMS.sales.indexSales')
            ->with(([
                'sales'=> $sales,
                'title'=> 'Unpaid orders']));
    }

    public function indexPaid() 
    {        
        //echo "index paid()"; die();
        $sales = Sale::where('paid', true)
            ->where('fulfilled', false)
            ->orderBy('sale_date')
            ->paginate(10);

        return view('IMS.sales.indexSales')
            ->with([
                'sales'=> $sales,
                'title'=> 'Paid but incomplete orders'
            ]);
    }

    public function indexCustomer($id)
    {   
        $customer = Customer::find($id);        

        $sales = Sale::where('customer_id', $id)
            ->paginate(10);

        return view('IMS.sales.indexSales')
            ->with([
                'sales' =>$sales,
                'title' => $customer->firstname ." ". $customer->lastname. " orders",
            ]);

    }

    public function create()
    {        
        // create a sale, show a paginateable list of customers 
        
        $customers = Customer::orderBy('lastname')->paginate(10);
                
        return view('IMS.sales.create')
            ->with('customers' , $customers);
    }


    public function store(Request $request)
    {
        // validate
        //  store the sale, which is attached to a customer
        // switch to edit mode to add and remove art

        $data = $request->validate([
            'customer_id'=> 'integer|required',
        ]);

        $sale = new Sale();
        $sale->customer_id = $data['customer_id'];
        $sale->save();

        return redirect()->route('ims.sales.edit', ['sale' => $sale->id] );
        
    }


    public function show($id)
    {
        // reroute to edit, not required ?        
    }


    public function edit($id)
    {

        $artworks = Artwork::where('sale_id', null)->orderBy('name')->paginate(8);
        $sale = Sale::find($id);        
        
        return view('IMS.sales.create')
            ->with([
                    'sale' => $sale,
                    'artworks' => $artworks,                   
                ]);
    }

    public function update(Request $request, $id)
    {
        // not required
    }


    public function destroy(Sale $sale)
    {        
        $artworks = Artwork::where('sale_id', $sale->id)->get();

        foreach($artworks as $artwork)
        {
            $artwork->sale_id = null;
            $artwork->sold = false;
            $artwork->save();
        }

        Sale::destroy($sale->id);      

        return redirect()->route('ims.sales.index') ;
    }

    public function addArtwork(Sale $sale, Artwork $artwork)
    {        
        $artwork->sale_id = $sale->id;
        $artwork->save();
        return redirect()->back();
    }

    public function removeArtwork(Sale $sale, Artwork $artwork)
    {
        $artwork->sale_id = null;
        $artwork->save();
        return redirect()->back();
    }

    public function complete($id, Request $request )
    {    

        $sale = Sale::find($id);

        $sale->fulfilled = true;
        $sale->notes = $request->notes;
        $sale->save();
        return redirect()->back();      
    }

    public function pay($id, Request $request)
    {   
        

       $sale  = Sale::find($id);

       $artworks = Artwork::where('sale_id', $sale->id)->get();
       foreach($artworks as $artwork)
       {
           $artwork->sold = true;
           $artwork->save();
       }


       $sale->paid = true;
       $sale->sale_price = $request->amount;
       $sale->notes = $request->notes;
       $sale->save();
       return redirect()->back();
    }
}