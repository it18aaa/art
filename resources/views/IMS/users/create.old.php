@extends('layouts.gal')

<div class="row">
    @section('content')




        <div class="col col-left">
            @if(!isset($user))
                <h1>Create User</h1>
                {!! Form::open(['route' => 'ims.users.store'])   !!}
            @else
                <h1>Edit User</h1>
                {!! Form::model($user, ['route' => ['ims.users.update', $user->id], 'method' => 'PUT']) !!}
            @endif
                
                <div class="form-group row">
                    {!! Form::label('name', 'Name', ['class' => 'col-sm-2 col-form-label']) !!}            
                    {!! Form::text('name', null, ['class' => 'col-sm-6 form-control']) !!}            
                </div>
                <div class="form-group row">
                    {!! Form::label('email', 'e-mail', ['class' => 'col-sm-2 col-form-label']) !!}            
                    {!! Form::text('email', null, ['class' => 'col-sm-6 form-control']) !!}            
                </div>

                <div class="form-group row">
                    <div class="col-sm-2">User Roles</div>
                    <div class="col-sm-8">
                        <div class="form-check ">                    
                            {!! Form::checkbox('ims', null, false, ['class' => 'form-check-input']) !!}                    
                            {!! Form::label('ims', 'Information Management System', ['class' => 'form-check-label']) !!}
                        </div>
                        <div class="form-check ">                    
                            {!! Form::checkbox('cms', null, false, ['class' => 'form-check-input']) !!}
                            {!! Form::label('cms', 'Content Management System', ['class' => 'form-check-label'] ) !!}
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    {!! Form::label('password', 'Password', ['class' => 'col-sm-2 col-form-label']) !!}            
                    {!! Form::password('password', null, ['class' => 'col-sm-6 form-control']) !!}            
                </div>

                {!! Form::submit('Submit', ['class' => 'btn btn-info']) !!}
                {!! Form::reset('Reset', ['class' => 'btn btn-info']) !!}
                
                {!! Form::close() !!}
            </div>
        
    @endsection
</div>
