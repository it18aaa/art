@if($artwork->exists)
    <form method="POST" action="/ims/artwork/edit/{{ $user->id }}">
    {{ hidden_field('patch')}}
@else
    <form method="POST" action="/ims/artwork/create">
@endif 
        {{ csrf_field() }}
        <input label="name" 
            type="text" 
            name="name" 
            value="{{ $user->name or old('name') }}">
        </input>
        <button type="submit" 
            class="btn btn-primary">{{ $submit_text or "Submit" }}
        </button>
    </form>