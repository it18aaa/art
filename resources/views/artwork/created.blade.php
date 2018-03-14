
@extends('layouts.gal')

@section('content')

<h1>{{ $artwork->name }} record created successfully </h1>

<img width="150" src="{{ '/img/artwork/' . $artwork->id . '.jpg' }}"



@endsection