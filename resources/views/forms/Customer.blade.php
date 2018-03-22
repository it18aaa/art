@extends('layouts.gal')


@section('content')


    @if(!isset($customer))
        <h1>Create Customer</h1>
        {!! Form::open(['route' => 'customers.store'])   !!}
    @else
        <h1>Edit Customer</h1>
        {!! Form::model($customer, ['route' => ['customers.update', $customer->id], 'method' => 'PUT']) !!}
    @endif
        
        <div class="form-group">
            {!! Form::label('firstname', 'First Name') !!}            
            {!! Form::text('firstname', null, ['class' => 'form-control']) !!}            
        </div>

        <div class="form-group">
            {!! Form::label('lastname', 'Last Name') !!}            
            {!! Form::text('lastname', null, ['class' => 'form-control']) !!}            
        </div>

        {!! Form::submit('Submit', ['class' => 'btn btn-info']) !!}
        {!! Form::reset('Reset', ['class' => 'btn btn-info']) !!}
        
        {!! Form::close() !!}
    
@endsection
