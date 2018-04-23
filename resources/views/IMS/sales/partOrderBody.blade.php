<div class="row">
    <div class="col">
        <div class="row">
            <div class="col">
                Order Items
            </div>
        </div>
        <table class="table table-sm border table-striped ">
            <thead>
                <tr>
                    <th>ID:</th>
                    <th>Name</th>
                    <th>List price</th>
                    <th>Remove</th>
                </tr>    
            </thead>
            <tbody>
                @foreach($sale->artworks as $artwork)
                    <tr
                        @include('IMS.sales.artworkTooltip');
                    >
                        <td>{{ $artwork->id }}: </td>
                        <td><strong>{{ $artwork->name }}</strong></td>
                        <td>£{{ number_format($artwork->price, 2) }}</td>
                        <td>
                        @if(!$sale->paid)
                            {!!  Form::open([
                                    'route' => ['ims.sales.removeArtwork', $sale->id, $artwork->id],                            
                                    'method' => 'delete'
                                ])  
                            !!}
                                    <button type="submit" 
                                        id="rem-art-{{$artwork->id}}"
                                        class="btn btn-default btn-sm">                            
                                        <span class="fas fa-times"></span>
                                    </button>
                            {!! Form::close() !!}
                        @endif 
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>