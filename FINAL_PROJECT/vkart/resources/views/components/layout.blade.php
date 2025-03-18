<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'VCart')</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    @yield('style')
</head>

<body>
    <div class="container">
        <x-nav-bar></x-nav-bar>  
        @yield('content')
    </div>

    <script src="{{ asset('assets/js/bootstrap.min.css') }}"></script>
    @yield('script')
</body>

</html>
