<div class="card">
    <div class="card-header">
        Body text
    </div>
    <div class="card-body">

        {!!  Form::open([
            'route' => ['cms.events.body', $event->id],
            'method' => 'put',
            ]) !!}
        
        {!! Form::textarea('body', $event->body, 
                [
                    'class' => 'form-control', 
                    'size' => '34x14',
                    'oninput' => 'enableBodySubmit()'
                ])
        
        !!}

        {!! Form::submit('submit', ['class' => 'btn btn-primary',
             'id' => 'bodySubmit',
             'disabled' => 'true',
             'style' => 'visibility: hidden'
            ]) !!}

        {!! Form::close() !!}

    </div>
</div>