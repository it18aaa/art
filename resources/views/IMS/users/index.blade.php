@extends('IMS.layout')

@section('title', 'Information Management System - User Management')


@section('content')
    @parent

    <h1>Users</h1>

    
    <div class="row">
        <div class="col-sm-4">
            {{ $users->links() }}
        </div>
        <div class="col-sm-4">
        </div>
        <div class="col-sm-4 text-right">
            <a href="{{ route('ims.users.create') }}" class="btn btn-success ">
                <span class="fas fa-user-plus"></span> Add User
            </a>
        </div>

    </div>
 

    <div class="row">
        <table class="table table-striped table-hover table-sm" >
            <thead class="table-sm">
                <th>ID</th>
                <th>Name</th>        
                @foreach($roles as $role)
                    <th>{{ $role->name }} </th>
                @endforeach
                <th></th>
                <th></th>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr >
                    <td> {{  $user->id }}</td>
                    <td>
                        <strong> {{  $user->name }}</strong><br />
                        {{ $user->email }}
                    </td>                                                
                    @foreach($roles as $role)                    
                        <td>
                        @if($user->hasRole($role->name))
                            <form method="post" 
                                action="roledetach/{{ $role->id }}/{{ $user->id }}">
                                {{ csrf_field() }}
                                <button type="submit" 
                                    id="roleDetach-{{$role->id}}-{{$user->id}}"
                                    class="btn btn-role btn-success btn-sm">
                                    <span class="fas fa-lock-open"></span> 
                                </button>
                                <br />
                            </form>
                        @else
                        <form method="post" 
                            action="roleattach/{{ $role->id }}/{{ $user->id }}">
                                {{ csrf_field() }}
                                <button type="submit" 
                                    id="roleAttach-{{$role->id}}-{{$user->id}}"
                                    class="btn btn-role btn-outline-secondary btn-sm">
                                    <span class="fas fa-lock"></span> 
                                </button>
                            </form>
                        @endif
                        </td>
                    @endforeach
                    <td><a class="btn btn-secondary btn-sm " id="edit-{{$user->id}}" href="users/{{ $user->id }}/edit">
                            <span class="fas fa-edit"></span> Edit
                        </a>
                    </td>  
                    <td><a class="btn btn-secondary btn-sm " 
                            id="password-{{$user->id}}" 
                            href="users/{{ $user->id }}/password">
                            <span class="fas fa-key"></span> Password
                        </a>
                    </td>  
                    
                    <td >
                        {!!  Form::open([
                                'route' => ['ims.users.destroy', $user->id],
                                'class' => 'delete',
                                'method' => 'delete'
                                ])  
                        !!}
                            <button type="submit"  
                                id="delete-{{$user->id}}"
                                class="delete btn btn-danger btn-sm">
                                <span class="fas fa-trash"></span> Delete
                            </button>
                        {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection


@section('scripts')

<script>
$("form.delete").submit(function(e) {
    e.preventDefault();
    var thisForm = this;
    swal({
        title: "Delete User?",
        text:  "You will not be able to recover this user",
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

@endsection