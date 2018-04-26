@extends('layouts.gal')

@section('content')
    @parent


    <div class="row">

        <div class="col-sm-7">
            @include('gallery.partFeatured')
        </div>
        <div class="col-sm-5">
            @include('gallery.partNews')
        </div>        
    </div>
    <div class="row">
        <div class="col">
            @include('gallery.partEvents')
        </div>
    </div>

    <div class="row">
        <div class="col">
            @include('gallery.partBrowse')
        </div>
    </div>


@endsection