<div class="card">
    <div class="card-header">
        Image
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col">
                <img src="{{ '/img/artwork/' . $artwork->id . ".jpg" }}" class="art-shadow img-fluid "/>
                &nbsp;<br />
            </div>            

        </div>
        <div class="row">
            <div class="col">
                
                {!! Form::open([
                    'route' => ['cms.artworks.addImage', $artwork->id],   
                    'files' => 'true',
                    'method' => 'put'
                ]) !!}

                <div class="form-group">
                    {!! Form::label('image', 'Image upload') !!}
                    {!! Form::file('image', ['class' => 'form-control-file']) !!}
                </div>
                    

                {!! Form::submit('Upload', ['class' => 'btn btn-primary']) !!}


                {!! Form::close() !!}
           
            </div>            
        </div>




    </div>
</div>