
            <h5>Add artwork to order</h5>
            <table class="table table-sm">
                @foreach($artworks as $artwork )                
                    <tr 
                        @include('IMS.sales.artworkTooltip')
                    >                
                        <td>
                        
                            {!!  Form::open([
                                    'route' => ['ims.sales.addArtwork', $sale->id, $artwork->id],                            
                                    'method' => 'post'
                                ])  
                            !!}
                                <button type="submit" class="btn btn-default btn-sm">                            
                                    <span class="fas fa-arrow-left"></span> Add
                                </button>
                            {!! Form::close() !!}                        
                        </td>
                        <td>
                            {{ $artwork->id }}
                        </td>
                        <td>
                            {{ $artwork->name }}
                        </td>                                    
                    </tr>
                @endforeach
            </table>
            {{ $artworks->links() }}