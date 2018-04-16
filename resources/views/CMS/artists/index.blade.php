@extends('CMS.layout')


@section('content')
    @parent

<h1>Artists</h1>

    <div class="row">
        <table class="table table-striped table-hover table-sm" >
            <thead class="table-sm">
                <th>ID</th>
                <th>Name</th>                                              
                <th>Bio<br />(words)</th>  
                <th>Works</th>                              
            </thead>
            <tbody>
                @foreach($artists as $artist)
                <tr 
                    @include('CMS.artists.partArtistTooltip')
                >
                    <td>{{ $artist->id }}</td>
                    <td>
                        <strong>{{ $artist->firstname }} {{ $artist->lastname }}</strong><br />                      
                    </td>
                
                    <td>
                        {{ str_word_count($artist->bio) }}
                    </td>
                    <td>
                        {{ $artist->artworks->count() }}
                    </td>

                    
                    <td><a href="{{ route('cms.artists.edit', $artist->id) }}"
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
            {{ $artists->links() }}
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