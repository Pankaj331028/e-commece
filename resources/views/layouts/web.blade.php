<!DOCTYPE html>
<html>
<head>
    @include('includes/web.head')
</head>

<body>
    @include('includes/web.header')
    @yield('content')
    @include('includes/web.footer')
</body>
</html>