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

<div class="container-fluid">
    <div class="row">
        <div class="col">
        <div class="jumbotron" id="splash">            
                <div class="row">
                    <div class="col-md-4">
                        “Creativity takes courage”<br />                  
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;Henri&nbsp;Matisse
                    </div>
                    <div class="col-md-8 text-right text-top">
                        
                        <h1>Von Sprinkles</h1>   
                        <p>                           
                            Gallery of Modern Art
                            <p class="text-right"><a type="button" class="btn" href="/gallery" >Browse</a>
                            <a type="button" class="btn" href="/about" >About</a>  </p>                        
                    </div>
                </div> <!-- row -->
            <div><!-- continer -->
        </div> <!-- jumbotron -->
    </div><!--row -->
<div> <!-- container -->
        

                        </p>                    
    @yield('content')
 
        <script src="{{ asset('js/app.js') }}"></script>        
    </body>
</html>
