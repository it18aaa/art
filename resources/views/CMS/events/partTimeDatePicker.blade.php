<div class="card">
    <div class="card-header">
        Date and Time
    </div>
    <div class="card-body">
        {!!  Form::open([
            'route' => ['cms.events.dateTime', $event->id],
            'method' => 'put',
            ]) 
        !!}

        <!--<input type="text" name="dateTime" value="" 
            onclick="enableDateTimeSubmit()" /> -->

        {!! Form::text('dateTime', $event->timedate, [
                'onclick'=>'enableDateTimeSubmit()'
            ])
        !!}
	    
        
        {!! Form::submit('Update', ['class' => 'btn btn-primary',
            'id' => 'dateTimeSubmit',
            'disabled' => 'true',
            'style' => 'visibility: hidden'
        ]) !!}

        {!! Form::close() !!}


    </div>
</div>






