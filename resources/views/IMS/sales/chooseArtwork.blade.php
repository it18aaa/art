

    <div class="row">

        <div class="col-sm-8">
            


            <div>Order ID: {{ $sale->id }}</div>

    <div>{{ $sale->customer->title ." ". $sale->customer->firstname . " " . $sale->customer->lastname }}</div>

    <div>
        {{ $sale->customer->address1 }}, 
        {{ $sale->customer->address2 }},
        {{ $sale->customer->town }},
        {{ $sale->customer->county }}. 
        {{ $sale->customer->postcode }}</div>
            
                <table class="table table-sm">
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



        </div>
        <div class="col-sm-4">
            Available items:
            <table class="table table-sm">
            @foreach($artworks as $artwork )                
                <tr>                
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
