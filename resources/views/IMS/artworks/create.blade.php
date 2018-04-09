@extends('layouts.gal')

@section('title', 'IMS Artwork')



@section('content')


    @if(!isset($artwork))
        <h1>Create Artwork</h1>
        {!! Form::open(['route' => 'ims.artworks.store'])  !!}
        @php 
            $artist = null; 
            $default_dimension = 0;           
        @endphp
    @else
        <h1>Edit Artwork</h1>
        {!! Form::model($artwork, [
            'route' => ['ims.artworks.update', $artwork->id], 
            'method' => 'PUT']) !!}
        @php 
            $artist = $artwork->artist_id;
            $default_dimension = null;
        @endphp
    @endif

        <div class="row">
            <div class="col-sm-6">
                @isset($artwork)
                <div class="form-group">
                        {!! Form::label('id', 'id') !!}                    
                        {!! Form::text('id', null, ['disabled','class' => 'form-control']) !!}            
                </div>  
                @endisset
                <div class="form-group">
                        {!! Form::label('name', 'Name of piece') !!}                    
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}            
                </div>  

                <div class="form-group">
                    {!! Form::label('price', 'Sale Price') !!}
                    {!! Form::text('price', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-check">                   
                    {!! Form::radio('pricepublic', 1, true, 
                        ['class' => "form-check-input", 'id' => 'pricepublic1']) !!} 
                    {!! Form::label('pricepublic1', 'Price is visible to the public',
                        ['class' => 'form-check-label']) !!}
                </div>
                <div class="form-check">
                    {!! Form::radio('pricepublic', 0, false,
                        ['class' => "form-check-input", 'id' => 'pricepublic0']) !!}                    
                    {!! Form::label('pricepublic0', 'Price is not visible to public',
                        ['class' => 'form-check-label']) !!}
                </div>
            <hr />

                <div class="form-check">                   
                    {!! Form::radio('sold', 0, true, 
                        ['class' => "form-check-input", 'id' => 'sold0']) !!} 
                    {!! Form::label('sold0', 'Item is for sale',
                        ['class' => 'form-check-label']) !!}
                </div>
                <div class="form-check">
                    {!! Form::radio('sold', 1, false,
                        ['class' => "form-check-input", 'id' => 'sold1']) !!}   
                    {!! Form::label('sold1', 'Item has been sold',
                        ['class' => 'form-check-label']) !!}
                </div>

                <hr />
                Dimensions (cm)
                <div class="row">                
                        <div class="col-sm-4">
                            <div class="form-group ">
                                {!! Form::label('width', 'Width:') !!}
                                {!! Form::text('width', $default_dimension, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                            
                        <div class="col-sm-4">
                            <div class="form-group ">
                                {!! Form::label('height', 'Height:') !!}
                                {!! Form::text('height', $default_dimension, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group ">
                                {!! Form::label('depth', 'Depth:') !!}
                                {!! Form::text('depth', $default_dimension, ['class' => 'form-control']) !!}
                            </div>
                        </div>                
                </div>
                <em>please leave as 0 if unknown</em>

            </div>

            <div class="col-sm-6">     
            
                <div class="form-group ">
                    {!! Form::label('description', 'Description:') !!}
                    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}            
                </div>

                <div class="form-group">
                    {!! Form::label('artist', 'Artist') !!}
                    {!! Form::select('artist', App\Artist::orderAndListAll(), 
                        $artist, ['class' => 'form-control'] ) !!}
                </div>
                
            </div>

        </div>
        <div class="row">
             <div class="col">
             &nbsp;
             </div>
        </div>
            <div class="form-group">                
                {!! Form::submit('Submit', ['class' => 'btn btn-info col-sm-2']) !!}
                {!! Form::reset('Reset', ['class' => 'btn btn-info  col-sm-2']) !!}
            </div>
    
    {!! Form::close() !!}
    

@endsection
    