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

        <link href="{{ asset('css/gal.css') }}" rel="stylesheet"> 

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    </head>
    <body>

        <div class="jumbotron text-center">
            <h1>von sprinkles</h1>      
        </div>
        <a href="/gallery" class="text-center">Browse</a>
        <script src="{{ asset('js/app.js') }}"></script>        
    </body>
</html>
