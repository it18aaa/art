@extends('layouts.gal')

@section('title', 'IMS Sales')

@section('content')

<h1>Sales</h1>

<div class = "row">
    <div class="col-sm-3 text-right">
        <a href="{{ route('ims.sales.create') }}" class="btn btn-success ">
            <span class="fas fa-pound-sign"></span> New Sale
        </a>
    </div>

 <div class="col-sm-3 text-right">
        <a href="{{ route('ims.sales.index.unpaid') }}" class="btn btn-success ">
            <span class="fas fa-pound-sign"></span> Upaid
        </a>
    </div>

     <div class="col-sm-3 text-right">
        <a href="{{ route('ims.sales.index.paid') }}" class="btn btn-success ">
            <span class="fas fa-pound-sign"></span> Paid
        </a>
    </div>

     <div class="col-sm-3 text-right">
        <a href="{{ route('ims.sales.index.complete') }}" class="btn btn-success ">
            <span class="fas fa-pound-sign"></span> Complete
        </a>
    </div>


</div>

@endsection