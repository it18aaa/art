@extends('IMS.layout')

@section('title', 'Information Management System')

@section('content')
    @parent

    <h1>Information Management System</h1>

    <div class="row">
        <div class="col-sm-2">
            <h4>Sales</h4>
            <ul>
            <li><a href="{{ route('ims.sales.index') }}">Management</a></li>    
            <li><a href="{{ route('ims.sales.create') }}">New order</a></li>
            </ul>
        </div>

        <div class="col-sm-23">
            <h4>Artwork</h4>
            <ul>
                <li><a href="{{ route('ims.artworks.index') }}">Artwork</a></li>  
                <li><a href="{{ route('ims.artworks.create') }}">Add Artwork</a></li>
            </ul>
        </div>        
        <div class="col-sm-2">
                <h3>Customers</h3>
                <li><a href="{{ route('ims.customers.index') }}">Customer Index</a></li>                
                <li><a href="{{ route('ims.customers.create') }}">Add a customer</a></li>                
        </div>
        <div class="col-sm-2">
                <h3>Artists</h3>
                <li><a href="{{ route('ims.artists.index') }}">Artists index</a></li>                
                <li><a href="{{ route('ims.artists.index') }}">Add an artist</a></li>                
        </div>
        
        <div class="col-sm-2">
                <h3>Users</h3>
                <li><a href="{{ route('ims.users.index') }}">Users index</a></li>  
                <li><a href="{{ route('ims.users.create') }}">Add a user</a></li>
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