@extends('layouts.gal')

@section('title', 'CMS Dashboard')


@section('sidebar')
    @parent    
@endsection

@section('content')

    <h1> CMS Dashboard </h1>

    <a href="/cms/artwork/descriptions">Update a description</a>


    <a href="{{ route('cms.artworks.index') }}">Artwork</a>


@endsection