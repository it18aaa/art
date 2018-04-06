@extends('layouts.gal')

@section('title', 'Page Title')


@section('sidebar')
    @parent
    
@endsection

@section('content')
    <div>
        <h1>{{ $artwork->name }}</h1>
    </div>  
    <img src="{{ '/img/artwork/' . $artwork->id . ".jpg" }}" class="art-shadow img-fluid "/>
          
    <div>by {{ $artwork->artist->firstname . " " .$artwork->artist->lastname }}</div>

    <div>
    @if($artwork->sale_id != null && !$artwork->sold)
        <h3>under offer</h3>
    @elseif($artwork->sold)
        <h3>sold</h3>
    @endif
    
    </div>

    <div>
        @if($artwork->pricepublic && !$artwork->sold)        
                £{{ $artwork->price }}        
        @elseif(!$artwork->sold)
            (Please enquire about price)
        @endif
    </div>  
    <div class="row">
        <h4>Description of the piece</h4>    
    </div>
    <div class="row">
        Tags: 
        @foreach($artwork->tags as $tag)
            <a href="/artwork/tagged/{{ $tag->id }}">{{ $tag->name }}</a>
        @endforeach
    </div>  
    <div class="row"

        @if( null !==  Auth::user())
            @if (Auth::user()->hasRole('cms')) 
                <div>                                       
                <a href="/cms/artwork/description/{{ $artwork->id }}">
                Click here to edit the description
                </a>
                </div>
            @endif
        @endif
    </div>
    
    {{ $artwork->description }}
@endsection



   