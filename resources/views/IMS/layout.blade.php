@extends('layouts.gal')


@section('content')

<ul class="nav nav-tabs justify-content-end">
    <li class="nav-item">
        <a class="nav-link" href="{{ route('ims.home') }}">Home</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('ims.artworks.index') }}">Artwork</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('ims.artists.index') }}">Artists</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('ims.sales.index') }}">Sales</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('ims.customers.index') }}">Customers</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('ims.users.index') }}">Users</a>
    </li>
</ul>


    @parent
@endsection