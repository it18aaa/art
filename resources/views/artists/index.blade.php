@extends('layouts.gal')


@section('content')

<h1>Artists</h1>

<div class="row">
    <div class="col-sm-6">
        {{  $artists->links() }} <br />
        <table class="table table-sm table-striped table-bordered">
        @foreach($artists as $artist)
            <tr>
                <td>
                    {{  $artist->id }}
                </td>
                <td>
                    {{  $artist->firstname  }}
                </td>
                <td>
                    {{  $artist->lastname  }}
                </td>
                <td>
                    {{ $artist->countArtworks() }}
                </td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/artists/{{ $artist->id }}">View</a>
                </td>
                <td>
                    <a  class="btn btn-primary btn-sm" href="/artists/{{ $artist->id }}/edit">Modify</a>
                </td>                
            </tr>
        @endforeach
        </table>
        <div class="row">
            <div class="col-sm-6">
                {{  $artists->links() }} <br />
                Total: {{ $artists->total() }}
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <ul>
            <li><a href="/artists/create">create new artist</a></li>
        </ul>
    </div>
</div>

@endsection
