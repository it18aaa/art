@extends('layouts.gal')

@section('title', 'art')


@section('sidebar')
    @parent
@endsection

@section('content')   


    @foreach(array_chunk($artwork->all(),3) as $threeArtworks)
        <div class="row">            
            @foreach($threeArtworks as $piece)            
                <div class="col-sm">                
                    <div class="piece " style="border-bottom: 1px dashed #bbb; margin-bottom: 15px; ">
                        
                        <div>
                            <a href="/artwork/{{ $piece->id}}" class="">                            
                                <img src="img/artwork/{{ $piece->id }}.jpg" class="img-thumbnail art-shadow"/>                            
                            </a>
                        </div>

                        <div  style="padding-top: 10px;">
                            <a href="/artwork/{{ $piece->id}}" class="">
                                {{ $piece->name }}
                            </a>
                        </div>                                                
                        <div >
                            {{ $piece->artist->name }}
                        </div>
                        <div class="">
                        
                        
                        </div>                
                    </div>
                </div>                
            @endforeach
        </div>
    @endforeach
@endsection