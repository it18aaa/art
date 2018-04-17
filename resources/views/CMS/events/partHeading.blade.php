<div class="card">
    <div class="card-header">
        Heading text
    </div>
    <div class="card-body">

        {!!  Form::open([
            'route' => ['cms.events.heading', $event->id],
            'method' => 'put',
            ]) !!}
        
        {!! Form::textarea('heading', $event->heading, 
                [
                    'class' => 'form-control', 
                    'size' => '34x3',
                    'oninput' => 'enableHeadingSubmit()'
                ])        
        !!}

        {!! Form::submit('submit', ['class' => 'btn btn-primary',
             'id' => 'headingSubmit',
             'disabled' => 'true',
             'style' => 'visibility: hidden'
            ]) !!}

        {!! Form::close() !!}

    </div>
</div>