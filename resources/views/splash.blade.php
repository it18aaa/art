@extends('layouts.splash')

@section('title', 'art')

@section('content')
    <div class="container-fluid" 
        >
        <div class="row">                        
            <h5>Featured artwork</h5>
            <hr>
        </div>
        <div class="row" >                        
            @foreach($featured as $piece)            
                <div class="col-sm">                
                    <div class="piece " >
                                            
                        <div>
                            <a href="/artwork/{{ $piece->id}}" >                            
                                <img src="img/artwork/{{ $piece->id }}.jpg" class="img-thumbnail"/>                            
                            </a>
                        </div>

                        <div class="text-center ">
                            <a href="/artwork/{{ $piece->id}}" class="splashlinks">
                                {{ $piece->name }}
                            </a>
                        </div>                                                

                        
                        <div class="">
                        
                        
                        </div>                
                    </div>
                </div>                
            @endforeach
        </div>
    </div>
@endsection    