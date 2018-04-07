data-toggle="tooltip" 
    title="<p align='center'>
                <strng>{{$artwork->name}}</strong><br />
                by {{ $artwork->artist->firstname}} {{$artwork->artist->lastname}} <br />
                <img src='/img/artwork/{{$artwork->id}}.jpg' width=100 /> <br /> 
                price £{{ $artwork->price }}
            </p>"                
                    