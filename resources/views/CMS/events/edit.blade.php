@extends('CMS.layout')


@section('content')
    @parent

<h1>{{$event->heading }}</h1>

<div class="row">
    <div class="col-sm-3">
        <div class="row">
            <div class="col">
                @include('CMS.events.partHeading')
            </div>
        </div>

        <div class="row">
            <div class="col">
                @include('CMS.events.partToggleLive')
            </div>
        </div>


        <div class="row">
            <div class="col">
                @include('CMS.events.partTags')
            </div>
        </div>
    </div>

    <div class="col-sm-6">

        <div class="row">
            <div class="col">
                @include('CMS.events.partBody')
            </div>
        </div>
    </div>

    <div class="col-sm-3">

        

        <div class="row">
            <div class="col">
                @include('CMS.events.partImagePicker')
            </div>
        </div>

        <div class="row">
            <div class="col">
                @include('CMS.events.partTimeDatePicker')
            </div>
        </div>



    </div>




</div>




@endsection



@section('scripts')

<script>
    function enableBodySubmit() {
        var submitButton = document.getElementById("bodySubmit")
        submitButton.style.visibility = 'visible';
        submitButton.disabled = false;      
    }

    function enableHeadingSubmit() {
        var submitButton = document.getElementById("headingSubmit")
        submitButton.style.visibility = 'visible';
        submitButton.disabled = false;      
    }

</script>

@endsection