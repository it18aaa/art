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
                <li><a href="artworks/create">create an artwork</a></li>   
  
                more functionality will appear here in later releases

            </ul>
        </div>        
        <div class="col-sm-6">
            
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