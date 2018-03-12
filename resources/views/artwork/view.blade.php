@extends('layouts.gal')

@section('title', 'Page Title')


@section('sidebar')
    @parent
    
@endsection

@section('content')
    <img src="{{ '/img/artwork/' . $artwork->id . ".jpg" }}" />
    <div>{{ $artwork->name }}</div>        
    <div>by {{ $artwork->artist->name }}</div>
    <h3>Description of the piece</h3>


@endsection



   