@extends('layouts.gal')

@section('title', 'CMS Dashboard')


@section('sidebar')
    @parent    
@endsection

@section('content')
    <h1> CMS Dashboard </h1>

    @for($a=0; $a<30; $a++)
    <br />
    @endfor
@endsection