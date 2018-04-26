<div class="row">
    <div class="col">
        <h3>News</h3>
        @foreach($news as $article)
            <div class="row">
                <div class="col">
                    {{$article->heading}}
                </div>
            </div>
        @endforeach

    </div>
</div>