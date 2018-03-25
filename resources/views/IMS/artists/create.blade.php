@extends('layouts.gal')


@section('content')


    @if(!isset($artist))
        <h1>Create Artist</h1>
        {!! Form::open(['route' => 'ims.artists.store'])   !!}
    @else
        <h1>Edit Artist</h1>
        {!! Form::model($artist, ['route' => ['ims.artists.update', $artist->id], 'method' => 'PUT']) !!}
    @endif
        
        <div class="form-group">
            {!! Form::label('firstname', 'Name') !!}            
            {!! Form::text('firstname', null, ['class' => 'form-control']) !!}            
        </div>      

        <div class="form-group">
            {!! Form::label('lastname', 'Name') !!}            
            {!! Form::text('lastname', null, ['class' => 'form-control']) !!}            
        </div>

        <div class="form-group">
            {!! Form::label('bio', 'Biography') !!}
            {!! Form::textarea('bio', null, ['class' => 'form-control']) !!}            
        </div>

        {!! Form::submit('Submit', ['class' => 'btn btn-info']) !!}
        {!! Form::reset('Reset', ['class' => 'btn btn-info']) !!}
        
        {!! Form::close() !!}
    
@endsection
