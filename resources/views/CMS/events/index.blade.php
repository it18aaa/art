@extends('CMS.layout')


@section('content')
    @parent

<h1>Events</h1>


<div class="row">
        <table class="table table-striped table-hover table-sm" >
            <thead class="table-sm">
                <th>ID</th>
                <th>Heading</th>                                              
                <th>Body<br />(words)</th>  
                <th>Live</th>                              
                <th>Time & Date</th>
            </thead>
            <tbody>
                @foreach($events as $event)
                <tr 
                    @include('CMS.events.partEventTooltip')
                >
                    <td>{{ $event->id }}</td>
                    <td>
                        <strong>{{ $event->heading }}</strong><br />                      
                    </td>
                
                    <td>
                        {{ str_word_count($event->body) }}
                    </td>
                    <td>
                        {{ $event->live }}
                    </td>
                                        
                    <td><a href="{{ route('cms.events.edit', $event->id) }}"
                                class="btn btn-secondary btn-sm " >                                              
                            <span class="fas fa-edit"></span> View & Edit
                    </a>
                    </td>  
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col">
            {{ $events->links() }}
        </div>
    </div>

@endsection


@section('scripts')

<script>

$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip({
        animated: 'fade',
        placement: 'bottom',
        html: true
    }); 
});
</script>

@endsection