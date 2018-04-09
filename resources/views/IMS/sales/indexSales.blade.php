@extends('layouts.gal')

@section('title', 'IMS Sales')

@section('content')
    <table class="table">
    <thead>
    <th>Sale ID:</th>
    <th>Customer ID:</th>
    <th>Customer Name:</th>    
    <th>Order Value</th>
    <th>Date</th>
    <th>Paid</th>
    <th>Complete</th>
    
    </thead>
    @foreach($sales as $sale)
        <tr>            
            <td>{{ $sale->id }} </td>
            <td>{{ $sale->customer->firstname }}</td>
            <td>{{ $sale->customer->lastname }}</td>            
            @if($sale->paid)
                <td>£{{ number_format($sale->sale_price) }}</td>
            @endif
            <td>{{ $sale->sale_date }}</td>
            <td>{{ $sale->paid }}</td>
            <td>{{ $sale->fulfilled }}</td>

            <td>
                <a href="{{ route('ims.sales.edit', $sale->id) }}">
                    <button type="submit" class="btn btn-success btn-sm">                            
                        <span class="fas fa-check"></span> View                                
                    </button>
                </a>
                {!! Form::close() !!}   
            </td>
        </tr>            
    @endforeach
    </table>
@endsection


@section('scripts')

@endsection