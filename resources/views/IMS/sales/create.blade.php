@extends('IMS.layout')

@section('title', 'Information Management System - Sales - New')

@section('content')
    @parent

<h2>Sales Order</h2>

    @if( !isset($sale) )
        @include('IMS.sales.chooseCustomer')                    
    @else
        @include('IMS.sales.editSale')                    
    @endif

@endsection