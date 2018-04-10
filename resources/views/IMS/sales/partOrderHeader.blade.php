<div class="row">
    <div class="col-sm-6">
        <div class="row">
            <div class="col">
                Order ID: {{ $sale->id }}        
            </div>
        </div>
        <div class="row">
            <div class="col">
                {{$sale->sale_date }}
            </div>
        </div>
    </div>
    
    <div class="col-sm-6">

        Customer ID: {{ $sale->customer->id }} <br />

        <strong>{{ $sale->customer->title ." ".
                    $sale->customer->firstname . " " . 
                    $sale->customer->lastname
                }}
        </strong> 
        <address class="small">
            {{ $sale->customer->address1 }}, 
            {{ $sale->customer->address2 }},
            {{ $sale->customer->town }},
            {{ $sale->customer->county }},
            {{ $sale->customer->postcode }}
        </address>
    </div>

</div>
