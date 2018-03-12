

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
<title>App name - @yield('title')</title>
</head>
<body>

<h1>art</h1>

@section('sidebar')    
    @if( null !==  Auth::user()) 
            @if (Auth::user()->hasRole('cms'))                         
                <a href="cms">cms</a>
            @endif
            @if (Auth::user()->hasRole('ims'))                        
                <a href="ims">ims</a>                 
            @endif  
            <a href="/loguserout">log out</a>
    @else
        <a href="/login">login</a>
    @endif        
    <a href="/about">about</a>
@show

<div class="container">
    @yield('content')
</div>

</body>
</html>