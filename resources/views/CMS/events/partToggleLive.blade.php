

<div class="card {{ $event->live ? 'border-success' : 'border-danger'}}">    

    <div class="card-body">      

        <div class="row">
            <div class="col-sm-6">
                {{ $event->live? 'Live' : 'Offline' }}
            </div>
            <div class="col">
        
                {!! Form::open([
                    'route' => ['cms.events.toggleLive', $event->id],
                    'class' => 'addTag',
                    'method' => 'put'
                    ]) !!}  
                
                    <button type="submit" class="toggleLive btn btn-secondary btn-sm">
                @if($event->live)                
                    <span class="fas fa-minus"></span> Disable
                @else
                    <span class="fas fa-plus"></span> Enable
                @endif
                    </button>

                {!! Form::close() !!}
            </div>
        </div>        
        
    </div>
</div>