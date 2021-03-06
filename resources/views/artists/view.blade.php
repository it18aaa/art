@extends('layouts.gal')


@section('content')

<h1>{{ $artist->firstname . " " . $artist->lastname }}</h1>
    <div class="row">
        {{ $artist->bio }}
    </div>

    <div class="row">
        <table class="table table-sm table-striped">
        <thead>
            <tr>
                <th>id</th>
                <th>Artwork name</th>
                <th>On sale?</th>
                <th>Price Public?</th>
                <th>creation</th>
                <th>modified</th>
            </tr>
        </thead>
            @foreach( $artworks as $artwork )
                <tr>
                    <td>
                        <a href="/artwork/{{ $artwork->id }}">{{ $artwork->name }}</a>
                    </td>
                    <td>{{ $artwork->price }}</td>
                    <td>{{ $artwork->sold }}</td>
                    <td>{{ $artwork->pricepublic }}</td>
                    <td>{{ $artwork->created_at }}</td>
                    <td>{{ $artwork->updated_at }}</td>
                </tr>
            @endforeach
        </table>
    </div>

    

@endsection