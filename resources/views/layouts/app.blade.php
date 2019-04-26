<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>

    @include('layouts.partials.meta')

    @yield('css')

    @include('layouts.partials.css')

</head>

<body class="antialiased">

<div id="app">
    @include('layouts.partials.nav')
    
    @yield('content')

</div>
</body>
@include('layouts.partials.scripts')
</html>
