@extends('layouts.gal')

@section('title', 'IMS Sales')

@section('content')

<h2>Sales Order</h2>

    @if( !isset($sale) )
        @include('IMS.sales.chooseCustomer')                    
    @else
        @include('IMS.sales.editSale')                    
    @endif

@endsection