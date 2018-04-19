@extends('IMS.layout')

@section('title', 'Information Management System - Artists')


@section('content')
    @parent

<h1>Artists</h1>

 <div class="row">
        <div class="col-sm-4">
            {{ $artists->links() }}
        </div>
        <div class="col-sm-4">
        </div>
        <div class="col-sm-4 text-right">
            <a href="{{ route('ims.artists.create') }}" class="btn btn-success ">
                <span class="fas fa-user-plus"></span> Add Artist
            </a>
        </div>
    </div>

    <div class="row">
        <table class="table table-striped table-hover table-sm" >
            <thead class="table-sm">
                <th>ID</th>
                <th>Name</th>
                <th>Artworks</th>
                <th>Sold</th>
            </thead>
            <tbody>
        @foreach($artists as $artist)
            <tr>
                <td>
                    {{  $artist->id }}
                </td>
                <td>
                    {{ $artist->title }}
                    <strong> {{  $artist->firstname  }} {{  $artist->lastname  }} </strong><br />
                    {{ $artist->email }}
                </td>
                <td>
                    {{ $artist->countArtworks() }}
                </td>
                <td>
                    {{ $artist->countSold() }}
                </td>
                <td><a class="btn btn-secondary btn-sm " 
                       href="artists/{{ $artist->id }}/edit">
                            <span class="fas fa-edit"></span> Edit
                    </a>
                </td>  
                <td >
                    {!!  Form::open([
                            'route' => ['ims.artists.destroy', $artist->id],
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
        </tbody>
        </table>
        <div class="row">
            <div class="col-sm-6">
                {{  $artists->links() }} <br />
                
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
        title: "Delete Artist?",
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