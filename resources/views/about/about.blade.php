<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">

        <title>art</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Anton" rel="stylesheet" />
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" 
            href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 
            crossorigin="anonymous">

        <!-- Styles -->
        <style>
        .title {
            text-align: center;
            color:#555555;
            font-family: raleway;
            font-size: 110px;
            /*weight: strong;*/
        }

        .links {
            text-align: center;
            color: #888aaa;
            font-family: raleway;
            font-size: 30px;
            /* weight:strong; */
            text-style: underline;
        }
        .piece {
            border: 10px solid black;
        }
        .piece-image img {
            width: 320px;
            height: 240px;
           /* float: left; */

        }
        .piece-title {
            color: #555555;
            font-family: raleway;
            font-size: 40px;
        }
        .piece-price {
            color: #555555;
            font-family: 'Anton', sans-serif;
            font-size: 20px;
            text-style: italic;
        }


        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title">
			art
                </div>
                </div class="subtext"></div>
				<div class="links">
				<a href="stuff">about</a> &amp; 
				<a href="stuff">stuff</a>                
                </div>
                
                <div class="about">
                <h1>About the Gallery</h1>
                <p>The Gallery was formed in 1974 by Wilbur Von Smallpants, a local art critic who had
                stumbled upon a vast horde of modern art in a small cave in Whitegate.  Wilbur brought 
                the Galleryto life with his new found stock, and then invited local artists to participate.
                From those humble beginings, ArtMart has grown to a dealing with over 30 artists selling over 
                500 pieces a year.
                 </p>
                
                 <p>Address:  45 Muse Arcades, Tidburton, Foxfield.  FU2 73X</p>
                 <p>Tel:  0131 212 2655</p>
                 <p>Email: sales@artMart.com</p>

                </div>
                
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>
