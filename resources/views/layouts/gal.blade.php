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

        <!-- <link href="{{ asset('css/gal.css') }}" rel="stylesheet"> -->

        <!-- Bootstrap CSS -->
        <!-- <link rel="stylesheet"
                href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
                integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
                crossorigin="anonymous"> -->

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    </head>
    <body>


        <!-- menu bar and title -->
        @section('topbar')


            <nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-right">
                <a class="navbar-brand mb-0 h1" href="/">art</a>       
                        @if( null !==  Auth::user())
                            @if (Auth::user()->hasRole('cms'))
                            <a class="btn btn-sm btn-outline-secondary" href="/cms" type="button">cms</a>
                            @endif
                            @if (Auth::user()->hasRole('ims'))
                            <a class="btn btn-sm btn-outline-secondary" href="/ims" type="button">ims</a>
                            @endif
                            <a class="btn btn-sm btn-outline-secondary" href="/loguserout" type="button">logout</a>
                        @else
                        <a class="btn btn-sm btn-outline-secondary" href="/login" type="button">login</a>
                        @endif
            </nav>                
        @show

        

        @section('sidebar')
            <div id='sidebar'>
                <ul>
                    <li><a href="/">gallery home</a></li>
                    <li><a href="/about">about</a></li>
                </ul>
            </div>
        @show

        <div class="container">
            @yield('content')
        </div>

       <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" 
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" 
            crossorigin="anonymous">
        </script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" 
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" 
            crossorigin="anonymous">
        </script> -->
            <!-- Scripts -->

        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
