<div class="row">
    <div class="col-sm-12">
        <div class="row">                
            
            <div class="col-sm-3">
                    @include('IMS.sales.partOrderStatus')
            </div>

            <div class="col-sm-9 bg-white border">
                <div class="row">
                    <div class="col">
                        Details
                    </div>                        
                </div>                    
                <div class="row">
                    <div class="col">
                        @include('IMS.sales.partOrderHeader')
                    </div>                        
                </div>                    
                <div class="row">
                    <div class="col">
                        @if($sale->artworks->count())                                
                            @include('IMS.sales.partOrderBody')
                        @else
                            Add items to the order.
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        @include('IMS.sales.partOrderFooter')
                    </div>
                </div>                    
            </div>
        </div>            
    </div>
</div>

@section('rightcontent')
    @if(!$sale->paid)
            @include('IMS.sales.chooseArtwork')
    @endif
@endsection


@section('scripts')

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip({
        animated: 'fade',
        placement: 'bottom',
        html: true
    }); 
});


$("form.delete").submit(function(e) {
    e.preventDefault();
    var thisForm = this;
    swal({
        title: "Delete?",
        text:  "You will not be able to recover this order",
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
