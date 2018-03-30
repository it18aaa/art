@extends('layouts.gal')

@section('content')

    @if(!isset($customer))
        <h1>Create Customer</h1>
        {!! Form::open(['route' => 'ims.customers.store'])   !!}
    @else
        <h1>Edit Customer</h1>
        {!! Form::model($customer, ['route' => ['ims.customers.update', $customer->id], 'method' => 'PUT']) !!}
    @endif
    
    <div class="row">
        <div class="col-sm-6">

            <div class="form-group">
                {!! Form::label('title', 'Title') !!}   
                {!! Form::text('title', null, ['class' => 'form-control']) !!}            
            </div>
            <div class="form-group">
                    {!! Form::label('firstname', 'First name') !!}                    
                    {!! Form::text('firstname', null, ['class' => 'form-control']) !!}            
            </div>

            <div class="form-group ">
                {!! Form::label('lastname', 'Last name') !!}            
                {!! Form::text('lastname', null, ['class' => 'form-control']) !!}            
            </div>

        </div>
        <div class="col-sm-6">            
            <div class="form-group ">
                {!! Form::label('email', 'e-mail address') !!}            
                {!! Form::text('email', null, ['class' => 'form-control']) !!}            
            </div>

            <div class="form-group ">
                {!! Form::label('address1', 'Address line 1') !!}            
                {!! Form::text('address1', null, ['class' => 'form-control']) !!}            
            </div>

            <div class="form-group ">
                {!! Form::label('address2', 'Address line 2') !!}            
                {!! Form::text('address2', null, ['class' => 'form-control']) !!}            
            </div>

            <div class="form-group ">
                {!! Form::label('town', 'Town or City') !!}            
                {!! Form::text('town', null, ['class' => 'form-control']) !!}            
            </div>

            <div class="form-group ">
                {!! Form::label('county', 'County') !!}            
                {!! Form::text('county', null, ['class' => 'form-control']) !!}            
            </div>

            <div class="form-group ">
                {!! Form::label('postcode', 'Postcode') !!}            
                {!! Form::text('postcode', null, ['class' => 'form-control']) !!}            
            </div>

            <div class="form-group ">
                {!! Form::label('telephone', 'Telephone') !!}            
                {!! Form::text('telephone', null, ['class' => 'form-control']) !!}            
            </div>
        </div>
    </div>

        {!! Form::submit('Submit', ['class' => 'btn btn-info']) !!}
        {!! Form::reset('Reset', ['class' => 'btn btn-info']) !!}
        
        {!! Form::close() !!}
    
@endsection
