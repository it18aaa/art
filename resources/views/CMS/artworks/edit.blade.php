
@extends('CMS.layout')


@section('content')
    @parent

<h1>{{$artwork->name }}</h1>

<div class="row">

        <div class="col-sm-4">
            <div class="row">
                <div class="col">
                    @include('CMS.artworks.partImagePicker')
                </div>
            </div>
        </div>



        <div class="col-sm-4">
            <div class="row">
                <div class="col">
                    @include('CMS.artworks.partDetails')
                </div>
            </div>

            <div class="row">
                <div class="col">
                    @include('CMS.artworks.partDescription')
                </div>
            </div>
        
        </div>


        


        <div class="col-sm-4">
            <div class="row">
                <div class="col">
                    @include('CMS.artworks.partTags')
                </div>
            </div>                                                
        </div>
    </div>

@endsection




@section('scripts')

<script>

    function enableDescriptionSubmit() {
        var submitButton = document.getElementById("descriptionSubmit")
        submitButton.style.visibility = 'visible';
        submitButton.disabled = false;      
    }


    $("form.delete").submit(function(e) {
        e.preventDefault();
        var thisForm = this;
        swal({
            title: "Remove tag?",
            text:  "Do you wish to remove this tag?",
            type: "warning",
            icon: "warning",
            buttons: true,
            dangerMode: true,            
        }).then((willDelete) => {
            if(willDelete) {
                thisForm.submit();
            } else {
                return false;
            }
        });        
    });
</script>



@endsection