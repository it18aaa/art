<div class="text-right">
    <div class="row">
        <div class="col">
            {{ $sale->itemCount() }} item(s): £{{ number_format($sale->calcTotalExVat(), 2) }}       
        </div>
    </div>

    <div class="row">    
        <div class="col">
            VAT: £{{number_format($sale->calcVat(),2) }}                           
        </div>
    </div>

    <div class="row">    
        <div class="col">
            Calculated total: £{{ number_format($sale->calcTotalIncVat(),2) }} 
        </div>
    </div>

    <div class="row">    
        <div class="col">
            @if($sale->paid)
                <strong>Paid: £{{ number_format($sale->sale_price,2) }}</strong>
            @endif
        </div>
    </div>

 </div>