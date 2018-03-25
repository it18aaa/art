@extends('layouts.gal')


@section('content')

<h1>Customer Index</h1>

<div class="row">
    <div class="col-sm-6">
        @foreach($customers as $customer)
            <div class="row">
                <div class="col-sm-3">
                    {{  $customer->id }}
                </div>
                <div class="col-sm-6">
                    {{  $customer->firstname . " " . $customer->lastname }}
                </div>
            </div>
        @endforeach
        <div class="row">
            <div class="col-sm-6">
                {{  $customers->links() }} <br />
                Total: {{ $customers->total() }}
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <ul>
            <li><a href="/ims/customers/create">create new customer</a></li>
        </ul>
    </div>
</div>

@endsection
