<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Bands and Albums Project</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Styles -->
        <link href="/css/app.css" rel="stylesheet">
    </head>
    <body class="w-4/5 mx-auto font-sans">
        <aside class="my-8 flex justify-between font-bold">
            <span>
                <p class="opacity-75">Bands and Albums Website</p>
            </span>
            <nav>
                <a href="{{ route('band.index') }}" class="mr-2">Bands</a>
                <a href="{{ route('album.index') }}">Albums</a>
            </nav>
        </aside>
        @yield('content')
        <script src="/js/app.js"></script>
    </body>
</html>
