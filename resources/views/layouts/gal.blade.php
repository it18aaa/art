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
        
        <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js" integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        
        <link href="{{ asset('css/gal.css') }}" rel="stylesheet"> 

        
    </head>
    <body>

        <!-- menu bar and title -->
        @section('topbar')
            @include('partials.nav')            
        @show

        <div class="container-fluid">
            <div class="row" >
                <div class="col-sm-2" >
                    <div class="col-sm-2" id="sticky-sidebar" >            
                        @section('sidebar')   
                        @if( null !==  Auth::user())
                                @if (Auth::user()->hasRole('cms'))                                    
                                @endif
                                @if (Auth::user()->hasRole('ims'))                                    
                                    @include('partials.imsleft')                                    
                                @endif                                    
                            @else                                
                            @endif

                        @show
                    </div>
                </div>
                <div class="col-sm-8" id="main">            

                    @include('layouts.flashmessage')
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
                    <div class="col-md-3" class="small">
                        Copyright Von Sprinkles 
                        Modern Art Gallery 2018                        
                    </div>
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-3">                    
                        <a href="/about">Contact Us</a>
                        to arrange a viewing or discuss a piece. 
                    </div>
                    <div class="col-md-2">
                    </div>
                </div>
            </div>
        </footer>

        <script>
                setTimeout(function() {
                    $('.flashmessage').fadeOut(5000);
                }, 1000);        
        </script>


        <script src="{{ asset('js/app.js') }}"></script>

        @yield('scripts')
    </body>
</html>
