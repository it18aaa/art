@extends('layouts.gal')

@section('title', 'art')


@section('sidebar')
    @parent
@endsection

@section('content')
    <p>page body</p>

                    <div class="gallery-browser">
                    @foreach($artwork as $piece)
                    
                    <div class="piece">
                        <div class="piece-image">
                            <a href="/artwork/{{ $piece->id}}" class="artwork-link">
                                <img src="img/artwork/{{ $piece->id }}.jpg" />
                            </a>
                        </div>
                        <div class="piece-title">
                            <a href="/artwork/{{ $piece->id}}" class="artwork-link">
                                {{ $piece->name }}
                            </a>
                        </div>
                        <div>
                                {{ $piece->artist->name }}
                        </div>
                        <div class="piece-price">
                            £{{ $piece->price }}
                        </div>
                        <div class="spacer">
                        </div>
                    </div>
                    @endforeach
                </div>

@endsection