@extends('CMS.layout')


@section('sidebar')
    @parent    
@endsection

@section('content')
    @parent 
    <h1>Content Management</h1>

    <a href="/cms/artwork/descriptions">Update a description</a>


@endsection