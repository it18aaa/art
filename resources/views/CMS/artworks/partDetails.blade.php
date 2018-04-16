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
                {{ $artwork->name }}
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
        

    </div>
</div>