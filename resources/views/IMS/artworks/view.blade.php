@extends('IMS.layout')

@section('title', 'Information Management System - Artwork - View')

@section('content')
    @parent

    <div class="row">
        <div class="col-sm-4">
            <div class="row">
                <div class="col">
                    <h3>{{ $artwork->name }}<h3>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    ID: {{ $artwork->id }}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    by {{ $artwork->artist->firstname }} {{ $artwork->artist->lastname}}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    £{{ number_format($artwork->price, 2) }}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    Status:            
                    @if($artwork->sale_id && !$artwork->sold)            
                        Reserved - 
                        <a href="{{ route('ims.sales.edit', $artwork->sale_id) }}">
                            order no. {{ $artwork->sale_id }}
                        </a>            
                    @elseif($artwork->sale_id && $artwork->sold)
                        Sold - 
                        <a href="{{ route('ims.sales.edit', $artwork->sale_id) }}">
                            order no. {{ $artwork->sale_id }}
                        </a>            
                    @else
                        On sale
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col">
                    Price is publicly available:
                    @if($artwork->price_public) 
                        Yes
                    @else
                        No
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col">
                    Tags:
                    @foreach($artwork->tags as $tag)
                        <a href="tags/{{ $tag->id}}">{{ $tag->name }}</a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <img src="{{ '/img/artwork/' . $artwork->id . ".jpg" }}" class="art-shadow img-fluid "/>
        </div>
    </div>
@endsection

