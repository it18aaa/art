@if($message = Session::get('info'))
    <div class="alert alert-success alert-block flashmessage">
        <button type="button" class="close" data-dismiss="alert">x</button>
        <strong>{{ $message }} </strong>
    </div>
@endif