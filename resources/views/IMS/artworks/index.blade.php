@extends('layouts.gal')

@section('title', 'IMS Artwork')



@section('content')

<h1>Artworks</h1>

    <div class="row">
        <div class="col-sm-4">
            {{ $artworks->links() }}
        </div>
        <div class="col-sm-4">
        </div>
        <div class="col-sm-4 text-right">
            <a href="{{ route('ims.artworks.create') }}" class="btn btn-success ">
                <span class="fas fa-user-plus"></span> Add Artwork
            </a>
        </div>
    </div>

    <div class="row">
        <table class="table table-striped table-hover table-sm" >
            <thead class="table-sm">
                <th>ID</th>
                <th>Name</th>                              
                <th>tags</th>
                <th>Sold</th> 
                <th>List<br />price is</th>
                <th>price<br />public</th>
            </thead>
            <tbody>
                @foreach($artworks as $artwork)
                <tr>
                    <td>{{ $artwork->id }}</td>
                    <td>{{ $artwork->name }}</td>
                    <td>
                        {{ count($artwork->tagNames()) }}
                    </td>
                    <td>
                        @if($artwork->sold)
                            <span class="fas fa-check"></span>
                        @endif
                    </td>
                    
                    <td> £{{ $artwork->price }}</td>

                    <td>
                        @if($artwork->pricepublic)
                            <span class="fas fa-check"></span>
                        @endif
                    </td>

                    <td><a class="btn btn-secondary btn-sm " 
                       href="artworks/{{ $artwork->id }}">
                            <span class="fas fa-eye"></span> View
                    </a>

                    <td><a class="btn btn-secondary btn-sm " 
                       href="artworks/{{ $artwork->id }}/edit">
                            <span class="fas fa-edit"></span> Edit
                    </a>
                </td>  
                    <td >
                    {!!  Form::open([
                            'route' => ['ims.artworks.destroy', $artwork->id],
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

            </tboyd>
        </table>
    </div>

@endsection

@section('scripts')
<script>
$("form.delete").submit(function(e) {
    e.preventDefault();
    var thisForm = this;
    swal({
        title: "Delete this piece of Artwork?",
        text:  "You will not be able to recover this Artwork",
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

