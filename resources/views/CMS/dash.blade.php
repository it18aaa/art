@extends('layouts.gal')

@section('title', 'CMS Dashboard')


@section('sidebar')
    @parent
    <p> this is appended to the master sidebar </p>
@endsection

@section('content')
    <p>page body</p>
@endsection