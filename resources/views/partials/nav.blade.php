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