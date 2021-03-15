<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="color-scheme" content="dark light">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/breadcrumbs.css') }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/breadcrumb.js') }}"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-base min-w-max">

            <!-- Page Heading -->
            <x-header />
            <div class="col-md-8">
                @yield('breadcrumbs')
            </div>
            <!-- Page Content -->
            <main>
                {{ $slot ?? '' }}
            </main>

            <x-footer />
        </div>
    </body>
</html>
