<h3>Please choose a customer</h3>

    <table class="table table-sm">
    <thead>
        <tr>
            <td>ID</td>
            <td>Firstname</td>
            <td>Lastname</td>
        </tr>
    </thead>
    @foreach($customers as $customer)
    <tr>
        <td>{{ $customer->id }}</td>
        <td>{{ $customer->firstname }}</td> 
        <td>{{ $customer->lastname }}</td>
        <td>
            {!! Form::open([
                    'route' => 'ims.sales.store',                
                    'method' => 'post'
                ])  
            !!}
            {!! Form::hidden('customer_id', $customer->id)  !!}
            <button type="submit" class="btn btn-success" id="cust-{{$customer->id}}">
                <span class="fas fa-plus"></span>  &nbsp;&nbsp;Create order
            </button>
            {!! Form::close()  !!}
        </td>
        
    </tr>
    @endforeach

    </table>



{{ $customers->links() }}