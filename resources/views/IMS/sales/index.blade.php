@extends('IMS.layout')

@section('title', 'Information Management System - Sales')

@section('content')
    @parent

<h1>Sales</h1>

<div class = "row">
    <div class="col-sm-3  text-center">
        <a href="{{ route('ims.sales.create') }}" 
            class="btn btn-primary btn-block btn-lg"><br/>
            <span class="fas fa-cart-plus fa-3x"></span> <br />New Sales <br />Order<br />&nbsp;
        </a>
        <br /><span class="fas fa-arrow-right fa-3x"></span>
    </div>

    <div class="col-sm-3  text-center">
        <a href="{{ route('ims.sales.index.unpaid') }}" 
            class="btn btn-warning btn-block btn-lg"><br />
            <span class="fas fa-pound-sign fa-3x"></span><br /> Upaid<br />Orders<br />{{ $countUnpaid }}
        </a>
        <br /><span class="fas fa-arrow-right fa-3x"></span>
    </div>

    <div class="col-sm-3 text-center">
        <a href="{{ route('ims.sales.index.paid') }}" 
            class="btn btn-info btn-block btn-lg"><br />
            <span class="fas fa-check fa-3x"></span><br />Paid<br />Orders<br /> {{ $countPaid }}
        </a>
            <br /><span class="fas fa-arrow-right fa-3x"></span>
    </div>

    <div class="col-sm-3  text-center">
        <a href="{{ route('ims.sales.index.complete') }}" 
            class="btn btn-success btn-block btn-lg"><br />
            <span class="fas fa-archive fa-3x"></span><br /> Complete<br />Orders<br />{{ $countComplete }}
            
        </a>
        <br /><span class="fas fa-check fa-3x"></span>
    </div>
</div>

@endsection