@extends('layouts.gal')

@section('title', 'IMS Dashboard')


@section('sidebar')
    @parent    
@endsection

@section('content')
    <h1>Information Management System</h1>

    <div class="row">
        <div class="col-sm-6">
            <h4>Artwork</h4>
            <ul>
                <li><a href="">create an artwork</a></li>   
                <li><a href="#">view an artwork</a></li>
                <li><a href="#">edit an artwork</a></li>     
                <li><a href="#">delete an artwork</a></li>     

            </ul>
        </div>        
        <div class="col-sm-6">
            <h4>Artists</h4>
            <ul>
                <li><a href="#">create an artist</a></li>   
                <li><a href="#">view an artist</a></li>
                <li><a href="#">edit an artist</a></li>     
                <li><a href="#">delete an artist</a></li>     
            </ul>
        </div>
    </div>
@endsection

@section('rightcontent')
    @parent
        <div>
            Logged in as {{ Auth::user()->name }} 
        </div>
        <div>
            <li><a href="#">Edit</a><br /></li>
            <li><a href="#">Edit</a><br /></li>
            <li><a href="#">Edit</a><br /></li>
        </div>
@endsection