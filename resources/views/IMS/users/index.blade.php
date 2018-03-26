@extends('layouts.gal')


@section('content')


    Users index

    <div class="row">
        <table class="table" >
        @foreach($users as $user)
        <tr>
            <td>{{  $user->id    }}<td>
            <td>{{  $user->name    }}</td>
            
            <td>@foreach($user->roles as $role)
                {{ $role->name }}
            @endforeach</td>
        </tr>
        @endforeach
        </table>
    </div>

@endsection