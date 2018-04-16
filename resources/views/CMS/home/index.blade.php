@extends('CMS.layout')

@section('title', 'CMS Dashboard')


@section('sidebar')
    @parent    
@endsection

@section('content')
    @parent 

    <h1>Content Management</h1>

    <a href="/cms/artwork/descriptions">Update a description</a>


    <a href="{{ route('cms.artworks.index') }}">Artwork</a>


@endsection