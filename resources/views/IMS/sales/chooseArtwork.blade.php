    <div class="row">
        <div class="col-sm-8 border">
            <div class="row">
                <div class="col-sm-6">
                    <ul class="list-group">
                        <li class="list-group-item">
                            Order ID: {{ $sale->id }}
                        </li>
                        <li class="list-group-item">
                            Customer ID: {{ $sale->customer->id }}
                        </li>
                        <li class="list-group-item">
                            {{ $sale->customer->title ." ".
                                $sale->customer->firstname . " " . 
                                $sale->customer->lastname
                            }}
                            <address>
                                {{ $sale->customer->address1 }},<br /> 
                                {{ $sale->customer->address2 }},<br /> 
                                {{ $sale->customer->town }},<br /> 
                                {{ $sale->customer->county }}. <br /> 
                                {{ $sale->customer->postcode }}
                            </address>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-6">
                    <ul class="list-group">
                        <li class="list-group-item">
                            {{ $sale->itemCount() }} item(s): £{{ number_format($sale->calcTotalExVat()) }}       
                        </li>
                        <li class="list-group-item">                                
                            VAT: £{{number_format($sale->calcVat()) }}                           
                        </li>
                        <li class="list-group-item">
                            Total: £{{ number_format($sale->calcTotalIncVat()) }} 
                        </li>
                    </ul>  
                    
                    <div>
                        @if(!$sale->fulfilled)
                            <h4>Pending Actions</h4>
                        @endif
                    </div>
                    <div>
                        @if(!$sale->paid)
                        Customer has not yet paid:                         
                            {!! Form::open([
                                'route' => ['ims.sales.pay', $sale->id], 
                                'method' => 'put'])  
                            !!}
                            {!! Form::label('amount', 'Amount') !!}
                            {!! Form::text('amount', $sale->calcTotalIncVat()) !!}

                                <button type="submit" class="btn btn-default btn-sm">                            
                                    <span class="fas fa-pound-sign"></span> Pay                                </button>
                            {!! Form::close() !!}                 

                        @elseif($sale->paid && !$sale->fulfilled)
                            {!! Form::open([
                                    'route' => ['ims.sales.complete', $sale->id], 
                                    'method' => 'put'])  
                                !!}
                                <button type="submit" class="btn btn-default btn-sm">                            
                                    <span class="fas fa-cross"></span>Complete order                                </button>
                            {!! Form::close() !!}   
                        @else
                            Order has been paid and is completed.
                        @endif
                    </div>

                    <div>
                        @if( !$sale->fulfilled && !$sale->paid)
                            <a href="#" class="btn btn-danger">Delete</a>
                        @endif
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div>
                        <h5>Order items:</h5>
                    </div>
                    <table class="table table-sm border">
                        <thead>
                            <tr>
                                <th>ID:</th>
                                <th>Name</th>
                                <th>List price</th>
                                <th></th>
                            </tr>    
                        </thead>
                        <tbody>
                            @foreach($sale->artworks as $artwork)
                                <tr
                                    @include('IMS.sales.artworkTooltip');
                                >
                                <td>{{ $artwork->id }}: </td>
                                <td>{{ $artwork->name }}</td>
                                <td>£{{ $artwork->price }}</td>
                                <td>
                                @if(!$sale->paid)
                                    {!!  Form::open([
                                            'route' => ['ims.sales.removeArtwork', $sale->id, $artwork->id],                            
                                            'method' => 'delete'
                                        ])  
                                    !!}
                                            <button type="submit" class="btn btn-default btn-sm">                            
                                                <span class="fas fa-arrow-right"></span> Remove
                                            </button>
                                    {!! Form::close() !!}
                                @endif 
                                </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
        @if(!$sale->paid)
            <h5>Artworks to add to order</h5>
            <table class="table table-sm">
                @foreach($artworks as $artwork )                
                    <tr 
                        @include('IMS.sales.artworkTooltip')
                    >                
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
        @endif
        </div>
    </div>
@section('scripts')

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip({
        animated: 'fade',
        placement: 'bottom',
        html: true
    }); 
});
</script>

@endsection
