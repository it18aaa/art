@extends('layouts.gal')

@section('title', 'IMS Sales')

@section('content')

<h1>Sales</h1>

<div class = "row">
    <div class="col-sm-4 text-right">
        <a href="{{ route('ims.sales.create') }}" class="btn btn-success ">
            <span class="fas fa-pound-sign"></span> Create a sale
        </a>
    </div>
</div>

@endsection