<div class="card">
    <div class="card-header">
        Details
    </div>
    <div class="card-body">

        <div class="row">
            <div class="col">
                Name:
            </div>
            <div class="col">
                {{ $artist->firstname }} {{ $artist->lastname }}
            </div>
        </div>
        <div class="row">
            <div class="col">
                ID: {{ $artist->id }}
            </div>
        </div>
        
        <div class="row">
            <div class="col">
                @foreach($artist->artworks as $artwork)
                    {{ $artwork->name }} <br />
                @endforeach
            </div>
        </div>
        

    </div>
</div>