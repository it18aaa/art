

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
<title>App name - @yield('title')</title>
</head>
<body>

<h1>art</h1>

@section('sidebar')   
    <ul>
    <li><a href="/">gallery home</a></li>
    <li><a href="/about">about</a></li>
    @if( null !==  Auth::user()) 
            @if (Auth::user()->hasRole('cms'))                         
                <li><a href="cms">cms</a></li>
            @endif
            @if (Auth::user()->hasRole('ims'))                        
            <li><a href="ims">ims</a></li>                 
            @endif  
            <li><a href="/loguserout">logout</a></li>
    @else
    <li><a href="/login">login</a></li>
    @endif        
    
    </ul>
@show

<div class="container">
    @yield('content')
</div>

</body>
</html>