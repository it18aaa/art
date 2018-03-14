@extends('layouts.gal')

@section('title', 'Page Title')


@section('sidebar')
    @parent
    
@endsection

@section('content')
    <div><h1>{{ $artwork->name }}</h1></div>  
    <img src="{{ '/img/artwork/' . $artwork->id . ".jpg" }}" class="art-shadow img-fluid "/>
          
    <div>by {{ $artwork->artist->name }}</div>

    <div>
    @if($artwork->pricepublic)        
            £{{ $artwork->price }}        
    @else
        (Please enquire about price)
    @endif
    </div>
    <h4>Description of the piece</h4>    
@endsection



   