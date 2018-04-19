@extends('IMS.layout')

@section('title', 'Information Management System - Sales')

@section('content')
    @parent
    
    <h3>{{$title}}</h3>
    <table class="table">
    <thead>
    <th>Sale ID:</th>
    <th>Customer ID:</th>
    <th>Customer Name:</th>    
    <th>Items</th>
    <th>Order Value</th>
    <th>Date</th>
    <th>Paid</th>
    <th>Complete</th>
    
    </thead>
    @foreach($sales as $sale)
        <tr>            
            <td>{{ $sale->id }} </td>
            <td>{{ $sale->customer->id }}</td>
            <td>{{ $sale->customer->firstname }} {{ $sale->customer->lastname }}</td>
            <td>{{ $sale->artworks->count() }}</td>
            <td>      
            @if($sale->paid)            
                £{{ number_format($sale->sale_price) }}            
            @endif
            </td>
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
    {{ $sales->links() }}
@endsection


@section('scripts')

@endsection