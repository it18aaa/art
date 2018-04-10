<div>
    <h4>Status</h4>
</div>
<div>
    @if(!$sale->paid)
        <div class="row">
            <div class="col">
                Order created <span class="fas fa-check"></span>
            </div>
        </div>        
        @if(!$sale->artworks->count())
            <div class="row">
                <div class="col">        
                    Add items to order to reserve
                </div>
            </div>
        @else
            <div class="row">
                <div class="col">        
                    Items reserved <span class="fas fa-check"></span>
                </div>
            </div>
        @endif
        
        @if($sale->artworks->count())
        <div class="row">
            <div class="col">
                <div class="card border">
                    <div class="card-body">
                        <div class="card-title">
                            Payment
                        </div>
                        <div>
                            {!! Form::open([
                                'route' => ['ims.sales.pay', $sale->id], 
                                'method' => 'put'])  
                            !!}                                                                
                            <div class="form-group">
                                {!! Form::label('amount', 'Amount') !!}
                                {!! Form::text('amount', $sale->calcTotalIncVat()) !!}
                            </div>
                            <div class="form-group ">
                                {!! Form::label('notes', 'Notes:') !!}
                                {!! Form::textarea('notes', null, ['class' => 'form-control','rows' => '3']) !!}            
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">                            
                                    <span class="fas fa-pound-sign"></span> Pay   
                                </button>
                            </div>
                            {!! Form::close() !!}     
                        </div>
                    </div>            
                </div>
            </div>
        </div>
        @endif
    @elseif($sale->paid && !$sale->fulfilled)
        <div class="row">
            <div class="col">
                Order created <span class="fas fa-check"></span>
            </div>
        </div>
        <div class="row">
            <div class="col">
                items reserved.<span class="fas fa-check"></span>
            </div>
        </div>
        <div class="row">
            <div class="col">
                Customer has paid.<span class="fas fa-check"></span>            
            </div>
        </div>
        <div class="row">
            <div class="col">
                Items have not been delivered to Customer
            </div>
        </div>

        <div>
            <div>
                {!! Form::model($sale, [
                        'route' => ['ims.sales.complete', $sale->id], 
                        'method' => 'put'])  
                    !!}
                <div class="form-group ">
                    {!! Form::label('notes', 'Notes:') !!}
                    {!! Form::textarea('notes', null, ['class' => 'form-control','rows' => '3']) !!}            
                </div>
                    <button type="submit" class="btn btn-success btn-block">                            
                        <span class="fas fa-check"></span> Complete order                                </button>
                {!! Form::close() !!}   
            </div>
        </div>
        
    @else
        
        <div class="text-center">
            <div>
                <br />
                <span class="fas fa-check fa-2x"></span><br />
                Complete
                <br /><br />
            </div>            
        </div>
        <div>
        @if($sale->notes != null )
            <div>
                <h5>Notes</h5> {{ $sale->notes }}
            </div>
        @endif
        </div>

    @endif
</div>                    

<div class="row">
    <div class="col">
    &nbsp; <br />
    &nbsp; <br />
    &nbsp; <br />
    &nbsp; <br />
    </div>
</div>

<div class="row">
    <div class="col">
        @if( !$sale->fulfilled && !$sale->paid)
            
            {!! Form::open([
                'route' => ['ims.sales.destroy', $sale->id], 
                'method' => 'delete',
                'class' => 'delete',
                ])  
            !!}                            
                <button type="submit" class="btn btn-warning btn-block pull-right">                            
                    <span class="fas fa-trash"></span> Cancel Order
                </button>
            {!! Form::close() !!}                 
        @endif
    </div>
</div>