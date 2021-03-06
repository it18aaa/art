<div class="row">
    <div class="col">
       <h3>Featured Artworks</h3>
        @foreach( array_chunk($featuredArtworks->all(),2) as $artworks)
            <div class="row">
                @foreach($artworks as $artwork)
                    <div class="col-sm">
                        <div class="piece" style="border-bottom: 1px dashed #bbb; margin-bottom: 15px; ">                        
                            <div>
                                <a href="/artwork/{{ $artwork->id}}" class="">                            
                                    <img src="img/artwork/{{ $artwork->id }}.jpg" 
                                        class="img-thumbnail art-shadow"/>                            
                                </a>
                            </div>
                            <div  style="padding-top: 10px;">
                                <a href="/artwork/{{ $artwork->id}}" class="">
                                    {{ $artwork->name }}
                                </a>
                            </div>       
                            <div >
                                £{{ $artwork->price }}
                            </div>                                         
                            <div >
                                {{ $artwork->artist->name }}
                            </div>
                            <div class="">                        
                            </div>                
                        </div>
                    </div>                
                @endforeach
            </div>
        @endforeach
            
    </div>
    
</div>
