@extends('layouts.gal')

@section('title', 'art')


@section('sidebar')
    @parent
@endsection

@section('content')   

        <div class="mainsplash text-center">        
        <h1>von sprinkles</h1>
            modern art gallery
               
        </div>


    @foreach(array_chunk($artwork->all(),2) as $threeArtworks)
        <div class="row">            
            @foreach($threeArtworks as $piece)            
                <div class="col-sm">                
                    <div class="piece ">
                        <div>
                            <a href="/artwork/{{ $piece->id}}" class="">
                                <h3>{{ $piece->name }}</h3>
                            </a>
                        </div>                        

                        <div>
                            <a href="/artwork/{{ $piece->id}}" class="">                            
                                <img src="img/artwork/{{ $piece->id }}.jpg" class="img-thumbnail art-shadow"/>                            
                            </a>
                        </div>
                        <div>
                        </div>&nbsp;
                        <div>
                            {{ $piece->artist->name }}
                        </div>
                        <div class="">
                            £{{ $piece->price }}
                        </div>                
                    </div>
                </div>                
            @endforeach
        </div>
    @endforeach
@endsection