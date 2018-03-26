@extends('layouts.gal')


@section('content')


    <h1>Users index</h1>

    <h3>User Roles</h3>

    <div class="row">
        <table class="table table-striped" >
        <thead class="table-dark">
        <th>ID</th>
        <th>Name</th>
        <th>e-mail</th>

        @foreach($roles as $role)
            <th>{{ $role->name }} </th>
        @endforeach
        <th></th>
        </thead>
        @foreach($users as $user)
        <tr>
            <td>{{  $user->id }}</td>
            <td>{{  $user->name }}</td>
            <td>{{ $user->email }}</td>
                            
            @foreach($roles as $role)                    
                <td>
                @if($user->hasRole($role->name))
                    <form method="post" action="roledetach/{{ $role->id }}/{{ $user->id }}">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-success btn-sm">yes</button>
                    </form>
                @else
                <form method="post" action="roleattach/{{ $role->id }}/{{ $user->id }}">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger btn-sm">no</button>
                    </form>
                @endif
                </td>
            @endforeach
            <td><a class="btn btn-primary btn-sm" href="users/{{ $user->id }}/edit">Edit</a></td>
                

        </tr>
        @endforeach
        </table>
    </div>

@endsection