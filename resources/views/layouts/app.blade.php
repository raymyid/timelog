<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name')) - {{ config('app.name') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ mix('/css/framework.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ mix('/css/app.css') }}">
    @stack('css')

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>

    </script>
</head>
<body>
    <div id="app">
        <header id="main-header">
@include('header')
        </header>

        <main id="main-content">
@yield('content')
        </main>

        <footer id="main-footer">
@include('footer')
        </footer>
    </div>

    <!-- Scripts -->
    <script src="{{ mix('/js/manifest.js') }}"></script>
    <script src="{{ mix('/js/vendor.js') }}"></script>
    <script src="{{ mix('/js/app.js') }}"></script>
    @stack('javascript')
</body>
</html>
