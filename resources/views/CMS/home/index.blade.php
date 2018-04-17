@extends('CMS.layout')

@section('title', 'CMS Dashboard')


@section('sidebar')
    @parent    
@endsection

@section('content')
    @parent 

    <h1>Content Management</h1>
    <br />
    <div class = "row">
        <div class="col-sm-4  text-center">
            <a href="{{ route('cms.artworks.index') }}" 
                class="btn btn-success btn-block btn-lg"><br/>
                <span class="fas fa-paint-brush fa-3x"></span> <br /><br />Artworks<br />&nbsp;
            </a>
        </div>

        <div class="col-sm-4  text-center">
            <a href="{{ route('cms.artists.index') }}" 
                class="btn btn-warning btn-block btn-lg"><br/>
                <span class="fas fa-users fa-3x"></span> <br /><br />Artists<br />&nbsp;
            </a>
            
        </div>

        <div class="col-sm-4  text-center">
            <a href="{{ route('cms.events.index') }}" 
                class="btn btn-primary btn-block btn-lg"><br/>
                <span class="fas fa-file-alt fa-3x"></span> <br /><br />News & Events<br />&nbsp;
            </a>           
        </div>
    </div>

@endsection