<div class="row">
    <div class="col">
        <h3>Events</h3>
        @foreach($events as $event)
            <div class="row">
                <div class="col">
                    {{$event->heading}}
                    {{$event->timedate}}
                </div>
            </div>
        @endforeach

    </div>
</div>