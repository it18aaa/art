@extends('layouts.gal')

@section('content')

<table >
    @foreach($artworks as $artwork) 
        <tr>
        <td><img src='/img/artwork/{{ $artwork->id }}.jpg' class="img-fluid" width=40></img></td>
        <td>{{ $artwork->name }} </a></td>
        <td>{{ $artwork->artist->name }} </a></td>
        <td>{{ $artwork->description }}</a></td>
        <Td><a href="/cms/artwork/description/{{ $artwork->id }}">Edit Description</a></td>
        </tr>
    @endforeach

</table>
@endsection