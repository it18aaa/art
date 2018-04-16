<div class="card">
    <div class="card-header">
        Description
    </div>
    <div class="card-body">

        {!!  Form::open([
            'route' => ['cms.artworks.description', $artwork->id],
            'method' => 'put',
            ]) !!}
        
        {!! Form::textarea('description', $artwork->description, 
                [
                    'class' => 'form-control', 
                    'size' => '34x6',
                    'oninput' => 'enableDescriptionSubmit()'
                ])
        
        !!}

        {!! Form::submit('submit', ['class' => 'btn btn-primary',
             'id' => 'descriptionSubmit',
             'disabled' => 'true',
             'style' => 'visibility: hidden'
            ]) !!}

        {!! Form::close() !!}

    </div>
</div>