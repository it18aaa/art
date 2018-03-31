@extends('layouts.gal')

@section('title', 'IMS Dashboard')


@section('sidebar')
    @parent    
@endsection

@section('content')
    <h1>Information Management System</h1>

    <div class="row">
        <div class="col-sm-3">
            <h4>Artwork</h4>
            <ul>
                <li><a href="{{ route('ims.artworks.index') }}">Artwork</a></li>                   
            </ul>
        </div>        
        <div class="col-sm-3">
                <h3>Customers</h3>
                <li><a href="{{ route('ims.customers.index') }}">Customers</a></li>                
        </div>
        <div class="col-sm-3">
                <h3>Artists</h3>
                <li><a href="{{ route('ims.artists.index') }}">Artists</a></li>                
        </div>
                <div class="col-sm-3">
                <h3>Users</h3>
                <li><a href="{{ route('ims.users.index') }}">Users</a></li>                
        </div>



    </div>
@endsection

@section('rightcontent')
    @parent
        <div>
            Logged in as {{ Auth::user()->name }} 
        </div>
        <div>
            
        </div>
@endsection