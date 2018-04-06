

    <div class="row">

        <div class="col-sm-8 border">
            <ul class="list-group">
                <li class="list-group-item">
                    Order ID: {{ $sale->id }}
                </li>
                <li class="list-group-item">
                    Customer ID: {{ $sale->customer->id }}
                </li>
                <li class="list-group-item">
                    {{ $sale->customer->title ." ". $sale->customer->firstname . " " . $sale->customer->lastname }}
                    <address>
                        {{ $sale->customer->address1 }},<br /> 
                        {{ $sale->customer->address2 }},<br /> 
                        {{ $sale->customer->town }},<br /> 
                        {{ $sale->customer->county }}. <br /> 
                        {{ $sale->customer->postcode }}
                    </address>
                </li>

                <li  class="list-group-item">
                Order Items: {{ $sale->itemCount() }}
                    <table class="table table-sm border">
                    <thead>
                        <tr>
                            <td>ID:</td>
                            <td>Name</td>
                            <td>List price</td>
                        </tr>    
                    </thead>
                    @foreach($sale->artworks as $item)
                        <tr>

                        <td>{{ $item->id }}: </td>
                        <td>{{ $item->name }}</td>
                        <td>£{{ $item->price }}</td>

                        <td>
                            {!!  Form::open([
                                    'route' => ['ims.sales.removeArtwork', $sale->id, $item->id],                            
                                    'method' => 'delete'
                                ])  
                            !!}
                                    <button type="submit" class="btn btn-default btn-sm">                            
                                        <span class="fas fa-arrow-right"></span> Remove
                                    </button>
                            {!! Form::close() !!}
                        </td>
                        </tr>

                    @endforeach
                        <thead>
                            <tr>
                                <td>Total:</td>        
                                <td></td>                                 
                                <td>£{{ number_format($sale->calcTotalExVat()) }}</td>        
                            </tr>
                        </thead>
                    </table>
                </li>
            </ul>
        
        


        </div>
        <div class="col-sm-4">
            <h5>Artworks to add to order</h5>
            <table class="table table-sm">
            @foreach($artworks as $artwork )                
                <tr data-toggle="tooltip" title="by {{ $artwork->artist->firstname." ".$artwork->artist->lastname }}, price £{{ $artwork->price }}">                
                    <td>
                        {!!  Form::open([
                                'route' => ['ims.sales.addArtwork', $sale->id, $artwork->id],                            
                                'method' => 'post'
                            ])  
                        !!}
                                <button type="submit" class="btn btn-default btn-sm">                            
                                    <span class="fas fa-arrow-left"></span> Add
                                </button>
                        {!! Form::close() !!}
                    </td>

                    <td>
                        {{ $artwork->id }}
                    </td>
                    <td>
                        {{ $artwork->name }}
                    </td>                                    
                </tr>

            @endforeach
            </table>

            {{ $artworks->links() }}
        </div>

    </div>


@section('scripts')

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>

@endsection
