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

        @if( null !==  Auth::user())
            @if (Auth::user()->hasRole('cms')) 
                <div>                                       
                <a href="/cms/artwork/description/{{ $artwork->id }}">
                Click here to edit the description
                </a>
                </div>
            @endif
        @endif
    
    {{ $artwork->description }}
@endsection



   