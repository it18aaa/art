@extends('CMS.layout')

@section('content')
    @parent
    <h1>{{$artist->firstname}} {{$artist->lastname}}</h1>

<div class="row">

        <div class="col-sm-6">
            <div class="row">
                <div class="col">
                    @include('CMS.artists.partImagePicker')
                </div>
            </div>

        </div>

        <div class="col-sm-6">
            <div class="row">
                <div class="col">
                    @include('CMS.artists.partDetails')
                </div>
            </div>
            <div class="row">
                <div class="col">
                    @include('CMS.artists.partBio')
                </div>
            </div>       
        </div>
    </div>

@endsection


@section('scripts')

<script>
    function enableBioSubmit() {
        var submitButton = document.getElementById("bioSubmit")
        submitButton.style.visibility = 'visible';
        submitButton.disabled = false;      
    }
</script>

@endsection