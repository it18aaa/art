@extends('layouts.gal')


    @section('content')
        
    <div class="row">

        <div class="col col-left">
            @if(!isset($user))
                <h1>Create User</h1>
                {!! Form::open(['route' => 'ims.users.store'])   !!}
            @else
                <h1>Edit User</h1>
                {!! Form::model($user, ['route' => ['ims.users.update', $user->id], 'method' => 'PUT']) !!}
            @endif
                
                <div class="form-group row">
                    {!! Form::label('name', 'Name', ['class' => 'col-sm-3 col-form-label']) !!}            
                    {!! Form::text('name', null, ['class' => 'col-sm-6 form-control']) !!}            
                </div>
                <div class="form-group row">
                    {!! Form::label('email', 'e-mail', ['class' => 'col-sm-3 col-form-label']) !!}            
                    {!! Form::text('email', null, ['class' => 'col-sm-6 form-control']) !!}            
                </div>

                <div class="form-group row">
                    {!! Form::label('password', 'Password', ['class' => 'col-sm-3 col-form-label']) !!}            
                    {!! Form::password('password', null, ['class' => 'col-sm-6 form-control']) !!}            
                </div>

                <div class="form-group row">
                    {!! Form::label('password_confirmation', 'Confirm Password', ['class' => 'col-sm-3 col-form-label']) !!}            
                    {!! Form::password('password_confirmation', null, ['class' => 'col-sm-6 form-control']) !!}            
                </div>

                {!! Form::submit('Submit', ['class' => 'btn btn-info']) !!}
                {!! Form::reset('Reset', ['class' => 'btn btn-info']) !!}
                
                {!! Form::close() !!}
            </div>
        
    @endsection
</div>
