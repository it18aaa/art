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

        

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/gal.css') }}" rel="stylesheet"> 

    </head>
    <body>


        <!-- menu bar and title -->
        @section('topbar')
            <nav class="navbar navbar-expand-md navbar-expand-sm navbar-light bg-faded ">
            <a class="navbar-brand " href="/">von sprinkles</a>
                <div class="container ">             
                
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">                
                        <!-- Left Side Of Navbar -->
                        
                        <ul class="navbar-nav mr-auto">  
                            <li><a class="nav-link"  href="/gallery">browse</a></li>
                            <li><a class="nav-link" href="/about">about</a></li>                  
                        </ul>
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @if( null !==  Auth::user())
                                @if (Auth::user()->hasRole('cms'))
                                    <li><a class="nav-link" href="/cms">cms</a></li>
                                @endif
                                @if (Auth::user()->hasRole('ims'))
                                    <li><a class="nav-link" href="/ims">ims</a></li>
                                @endif
                                    <li><a class="nav-link" href="/loguserout">logout</a></li>
                            @else
                                <li><a class="nav-link" href="/login">login</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </nav>
        @show

        <div class="container-fluid">
            <div class="row " >
                <div class="col-sm-2" >
                    <div class="col-sm-2" id="sticky-sidebar" >            
                        @section('sidebar')
                            
                            
                        @show
                    </div>
                </div>

                <div class="col-sm-8" id="main">            

                    @yield('content')

                </div>

                <div class="col-sm-2 ml-auto" id="main" >            

                    @yield('rightcontent')

                </div>
            </div class=""><!-- row -->
        </div>

        <footer class="container-fluid text-center">
            <div class="container-fluid">
            <hr />
                <div class="row">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-3">
                        Copyright sprinkly 2018
                        All rights reserved
                        
                        Copyright of artistic material belongs to artist.
                    </div>
                    <div class="col-md-3">
                    All artwork on this page is show for illustration purposes </div>
                    <div class="col-md-3">
                        more things go here
                    </div>
                    <div class="col-md-2">
                    </div>
                </div>
            </div>
        </footer>

        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
