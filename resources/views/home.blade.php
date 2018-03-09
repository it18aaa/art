@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!<br />
                    
                        {{ Auth::user()->name }} <br />

                        Roles:<ul>
                    @foreach(Auth::user()->roles as $r)
                
                        <li> {{ $r->description }} </li>

                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
