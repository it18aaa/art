@extends('layouts.gal')

@section('title', 'IMS Sales')

@section('content')

<h2>Order details</h2>

    @if( !isset($sale) )
        @include('IMS.sales.chooseCustomer')                    
    @else
        @include('IMS.sales.chooseArtwork')                    
    @endif

@endsection