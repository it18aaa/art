<div class="card">
    <div class="card-header">
        Tags
    </div>

    <div class="card-body">      

        @foreach($artwork->tags as $tag)                                
                    {!! Form::open([
                        'route' => ['cms.artworks.untag', $artwork->id],
                        'class' => 'delete',
                        'method' => 'delete'
                        ]) 
                    !!}
                    {!! Form::hidden('tag', $tag->name ) !!}
                        <div class="row">
                            <div class="col">
                                {{ $tag->name }}
                            </div>
                        
                            <div class="col text-right">
                                <button type="submit" id="deltag-{{$tag->name}}" class="delete btn btn-secondary btn-sm">
                                    <span class="fa fa-times"></span> 
                                </button>
                            </div>

                        </div>
                    {!! Form::close() !!}                                        
        @endforeach
                                                

        
        {!! Form::open([
            'route' => ['cms.artworks.tag', $artwork->id],
            'class' => 'addTag',
            'method' => 'put'
            ]) !!}  
        
        <div class="row">
            <div class="col-sm-8">
                {!! Form::text('tag', null, ['class' => 'form-control', 'id' => 'newtagtext'] ) !!}
            </div>
            <div class="col text-right">
                <button type="submit" id="addtag" class="delete btn btn-success btn-sm">
                    <span class="fas fa-plus"></span>
                </button>
            </div>
        </div>
        {!! Form::close() !!}   


    </div>
</div>