@extends('layouts.gal')

@section('title', 'IMS Customers')


@section('content')

<h1>Customer Index</h1>

<div class="row">
        <div class="col-sm-4">
            {{ $customers->links() }}
        </div>
        <div class="col-sm-4">
        </div>
        <div class="col-sm-4 text-right">
            <a href="{{ route('ims.customers.create') }}" class="btn btn-success ">
                <span class="fas fa-user-plus"></span> Add customer
            </a>
        </div>
    </div>

    <div class="row">
        <table class="table table-striped table-hover table-sm" >
            <thead class="table-sm">
                <th>ID</th>
                <th>Name</th>                                
            </thead>
            
        @foreach($customers as $customer)
            <tr>
                <td>
                    {{  $customer->id }}
                </td>
                <td>
                    {{ $customer->title }}
                    <strong> {{  $customer->firstname  }} {{  $customer->lastname  }} </strong><br />
                    {{ $customer->email }}
                </td>
                <td><a class="btn btn-secondary btn-sm " 
                       href="{{ route('ims.sales.index.customer', $customer->id) }}">
                            <span class="fas fa-file-alt"></span> Orders
                    </a>
                </td>  

                <td><a class="btn btn-secondary btn-sm " 
                       href="customers/{{ $customer->id }}/edit">
                            <span class="fas fa-edit"></span> Edit
                    </a>
                </td>  
                <td >
                    {!!  Form::open([
                            'route' => ['ims.customers.destroy', $customer->id],
                            'class' => 'delete',
                            'method' => 'delete'
                            ])  
                    !!}
                        <button type="submit"  
                                class="delete btn btn-danger btn-sm">
                            <span class="fas fa-trash"></span> Delete
                        </button>
                    {!! Form::close() !!}
                </td>
               
            </tr>
        @endforeach
        </table>
        <div class="row">
            <div class="col-sm-6">
                {{  $customers->links() }} <br />
                
            </div>
        </div>
    </div>
    
</div>

@endsection



@section('scripts')
<script>
$("form.delete").submit(function(e) {
    e.preventDefault();
    var thisForm = this;
    swal({
        title: "Delete Customer?",
        text:  "You will not be able to recover this Artist",
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

@endsection()