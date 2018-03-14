<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">
    
 
        <title>@yield('title')</title>

        <!-- fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css" />    
        <link href="https://fonts.googleapis.com/css?family=Anton" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Shadows+Into+Light" rel="stylesheet">

        <link href="{{ asset('css/gal.css') }}" rel="stylesheet"> 

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    </head>
    <body>

        <div class="jumbotron art-shadow" id="splash">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        “Creativity takes courage”                  
                         - Henri Matisse
                    </div>
                    <div class="col-md-8 text-right text-top">
                        
                        <h1>Von Sprinkles</h1>   
                        <p>                           
                        Gallery of Modern Art
</p>
                        <p class="text-right">
                            <a type="button" class="btn btn-dark" href="/gallery" >BROWSE</a>
                        </p>                    
                    </div>
                </div> <!-- row -->
            <div>
        </div>
        
        
    @yield('content')
 
        <script src="{{ asset('js/app.js') }}"></script>        
    </body>
</html>
