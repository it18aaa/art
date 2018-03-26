@if($message = Session::get('info'))
    <div class="alert alert-success alert-block flashmessage">
        <button type="button" class="close" data-dismiss="alert">x</button>
        <strong>{{ $message }} </strong>
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger alert-block">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif