@extends('layouts.gal')



@section('content')
    
    <div class="row">

        <div class="col col-left">
            <h1>Change password</h1>
            <h3>{{ $user->name }}</h3>
            {!! Form::open([
                'route' => ['ims.users.password.update', $user->id],
                'method' => 'put'
                ])  
            !!}    
        
            <div class="form-group row">
                {!! Form::label('password', 'Password', ['class' => 'col-sm-3 col-form-label']) !!}            
                {!! Form::password('password', null, ['class' => 'form-control']) !!}            
            </div>

            <div class="form-group row">
                {!! Form::label('password_confirmation', 'Confirm Password', ['class' => 'col-sm-3 col-form-label']) !!}            
                {!! Form::password('password_confirmation', null, ['class' => 'form-control']) !!}            
            </div>
            
                {!! Form::submit('submit', ['class' => 'btn btn-info'] ) !!}        
                {!! Form::reset('reset',  ['class' => 'btn btn-info']) !!}            

            {!! Form::close() !!}
        </div>
    </div>

@endsection