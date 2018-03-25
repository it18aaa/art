
@extends('layouts.gal')

@section('content')

<h1>Create an artwork record</h1>

    <form method="POST" action="/artworks" enctype="multipart/form-data">        
        <div class="form-group">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-sm-3 text-right">
                    Name:
                </div>
                <div class="col-sm-9">
                    <input label="name" 
                        type="text" 
                        name="name" 
                        value="">
                    </input>
                </div>            
            </div>

            <div class="row">
                <div class="col-sm-3 text-right">
                    Price:
                </div>
                <div class="col-sm-9">
                    <input label="name" 
                        type="text" 
                        name="price" 
                        value="">
                    </input>
                </div>            
            </div>

            <div class="row">
                <div class="col-sm-3 text-right">
                    Sold:
                </div>
                <div class="col-sm-3">
                    <input label="name" 
                        type="checkbox" 
                        name="sold" 
                        value="sold">
                    </input>
                </div>
            </div>
            <div class="row">
            
                <div class="col-sm-3 text-right">
                    Price is public?:
                </div>
                <div class="col-sm-3">
                    <input label="name" 
                        type="checkbox" 
                        name="pricepublic" 
                        value="pricepublic">
                    </input>
                </div>            
            </div>

            <div class="row">
                <div class="col-sm-3 text-right">
                    Artist:
                </div>
                <div class="col-sm-9">
                    <select name="artist_id" size="8">
                        @foreach($artists as $artist)
                            <option value="{{ $artist->id }}">{{ $artist->name }}</option>
                        @endforeach
                    </select>

                </div>            
            </div>

            <div class="row">
                <div class="col-sm-3 text-right">

                </div>
                <div class="col-sm-9">
                    <input type="file" name="artwork" accept="image/*">
                </div>
            </div>

            <button type="submit" 
                class="btn btn-primary">create
            </button>
        </div><!-- form group -->
    </form>
@endsection