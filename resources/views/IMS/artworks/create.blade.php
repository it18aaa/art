@extends('layouts.gal')


@section('content')


    @if(!isset($artwork))
        <h1>Create Artwork</h1>
        {!! Form::open(['route' => 'ims.artworks.store'])   !!}
    @else
        <h1>Edit Artwork</h1>
        {!! Form::model($artwork, ['route' => ['ims.artworks.update', $artwork->id], 'method' => 'PUT']) !!}
    @endif

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                        {!! Form::label('name', 'Name of piece') !!}                    
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}            
                </div>  

                <div class="form-group">
                    {!! Form::label('price', 'Sale Price') !!}
                    {!! Form::text('price', null, ['class' => 'form-control']) !!}
                </div>
            
            </div>

            <div class="col-sm-6">       
                <div class="form-group">
                    {!! Form::label('artist', 'Artist') !!}
                    {!! Form::select('artist', App\Artist::orderAndListAll(), 
                        null, ['class' => 'form-control'] ) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('sold', 'has been sold') !!}
                    {!! Form::checkbox('sold', null, false,['class' => 'left form-control']) !!}
                </div>
            </div>

        </div>

    {!! Form::submit('Submit', ['class' => 'btn btn-info']) !!}
    {!! Form::reset('Reset', ['class' => 'btn btn-info']) !!}
    
    {!! Form::close() !!}

@endsection
    