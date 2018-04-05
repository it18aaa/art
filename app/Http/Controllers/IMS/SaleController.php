<?php

namespace App\Http\Controllers\IMS;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Artwork;

class SaleController extends Controller
{

    public function index()
    {
        return view('IMS.sales.index');
    }


    public function create()
    {        
        // create a sale, show a paginateable list of customers 
        
        
        return view('IMS.sales.create');
    }


    public function store(Request $request)
    {
        // validate
        //  store the sale, which is attached to a customer
        // switch to edit mode to add and remove art


        echo __CLASS__ . " - " . __FUNCTION__ . " not yet implemented ";
    }


    public function show($id)
    {
        //
        echo __CLASS__ . " - " . __FUNCTION__ . " not yet implemented ";
    }


    public function edit($id)
    {
        //
        echo __CLASS__ . " - " . __FUNCTION__ . " not yet implemented ";
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
        $sale->artworks->push($artwork);
        return redirect()->back();
    }

    public function removeArtwork(Sale $sale, Artwork $artwork)
    {
        $sale->forget($artwork);
        return redirect()->back();
    }
}