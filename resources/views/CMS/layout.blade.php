@extends('layouts.gal')


@section('content')


<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link" href="{{ route('cms.index') }}">Content Management</a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('cms.artworks.index') }}">Artwork</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('cms.artists.index') }}">Artists</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">Events</a>
    </li>

</ul>


    @parent
@endsection
