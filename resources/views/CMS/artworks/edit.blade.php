@extends('layouts.gal')


@section('content')
{{-- 

    Show artwork details, but allow the CMS user is only allowed to 
    update the description, picture and tags


    tags can be a partial, perhaps?

--}}

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

                        <div class="row">
                            <div class="col-sm-6">
                                <a href="tags/{{ $tag->id}}">{{ $tag->name }}</a>
                            </div>
                            <div class="col-sm-6">
                                {!! Form::open([
                                    'route' => ['cms.artworks.untag', $tag->name],
                                    'class' => 'delete',
                                    'method' => 'put'
                                    ]) 
                                !!}
                                <button type="submit" class="delete btn btn-danger btn-sm">
                                    <span class="fas fa-trash"></span> delete
                                </button>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <img src="{{ '/img/artwork/' . $artwork->id . ".jpg" }}" class="art-shadow img-fluid "/>
        </div>
    </div>





@endsection


