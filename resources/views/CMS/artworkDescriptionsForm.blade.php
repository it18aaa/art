@extends('layouts.gal')


@section('content')

    <h3>Edit description - {{ $artwork->name }}</h3>
    <img src='/img/artwork/{{ $artwork->id }}.jpg' class="img-fluid" width=140></img><br />
    Artists name: {{ $artwork->artist->name }} <br />

    <form method="post" action="/cms/artwork/updateDescription">
        {{ csrf_field() }}

        <input type="hidden" name="id" value={{ $artwork->id }} />
        <textarea rows="8" cols="80" name="description">
        {{ $artwork->description }}
        </textarea>

        <button type="submit" value="submit">Update</button>
        <button type="reset" value="submit">Reset</buttun>
    </form>


@endsection