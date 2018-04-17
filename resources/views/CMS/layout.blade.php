@extends('layouts.gal')


@section('content')

<ul class="nav nav-tabs justify-content-end">
    <li class="nav-item">
        <a class="nav-link" href="{{ route('cms.index') }}">Home</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('cms.artworks.index') }}">Artwork</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('cms.artists.index') }}">Artists</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('cms.events.index') }}">Events</a>
    </li>
</ul>

    @parent
@endsection
