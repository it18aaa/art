@extends('CMS.layout')


@section('content')
    @parent
    <h1>Artworks</h1>

    <div class="row">
        <table class="table table-striped table-hover table-sm" >
            <thead class="table-sm">
                <th>ID</th>
                <th>Name<br />& Artist</th>                              
                <th>Tags</th>
                <th>Description<br />(words)</th>
                <th>Sold</th> 
                <th>List<br />price</th>
                <th>Price<br />public</th>
                <th>Dimensions</th>
            </thead>
            <tbody>
                @foreach($artworks as $artwork)
                <tr 
                    @include('CMS.artworks.partArtworkTooltip')
                >
                    <td>{{ $artwork->id }}</td>
                    <td>
                        <strong>{{ $artwork->name }}</strong><br />
                        {{ $artwork->artist->firstname . " " . $artwork->artist->lastname }}

                    </td>
                    <td>
                        {{ $artwork->tags->count()  }}
                    </td>
                    <td>
                        {{ str_word_count($artwork->description) }}
                    </td>
                    <td>
                        @if($artwork->sold)
                            <span class="fas fa-check"></span>
                        @endif
                    </td>
                    
                    <td> £{{ $artwork->price }}</td>

                    <td>
                        @if($artwork->pricepublic)
                            <span class="fas fa-check"></span>
                        @endif
                    </td>

                    <td>
                        @if($artwork->width >0 && $artwork->height > 0 )
                            {{ $artwork->width }} x {{$artwork->height}}
                        @endif
                    </td>                   

                    <td><a href="{{ route('cms.artworks.edit', $artwork->id) }}"
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
            {{ $artworks->links() }}
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