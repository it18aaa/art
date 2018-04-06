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
        return view('IMS.sales.index');
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
        //
        echo __CLASS__ . " - " . __FUNCTION__ . " not yet implemented ";
    }


    public function edit(Sale $sale)
    {

        $artworks = Artwork::where('sale_id', null)->orderBy('name')->paginate(8);
        
        return view('IMS.sales.create')
            ->with([
                    'sale' => $sale,
                    'artworks' => $artworks,                   
                ]);
    }

    public function update(Request $request, $id)
    {
        //
        echo __CLASS__ . " - " . __FUNCTION__ . " not yet implemented ";
    }


    public function destroy($id)
    {
        //
        echo __CLASS__ . " - " . __FUNCTION__ . " not yet implemented ";
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
}