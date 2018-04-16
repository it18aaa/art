<div class="card">
    <div class="card-header">
        Bio
    </div>
    <div class="card-body">

        {!!  Form::open([
            'route' => ['cms.artists.bio', $artist->id],
            'method' => 'put',
            ]) !!}
        
        {!! Form::textarea('bio', $artist->bio, 
                [
                    'class' => 'form-control', 
                    'size' => '34x6',
                    'oninput' => 'enableBioSubmit()'
                ])
        
        !!}

        {!! Form::submit('submit', ['class' => 'btn btn-primary',
             'id' => 'bioSubmit',
             'disabled' => 'true',
             'style' => 'visibility: hidden'
            ]) !!}

        {!! Form::close() !!}

    </div>
</div>