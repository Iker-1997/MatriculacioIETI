<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Matriculació IETI</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function(){
                const html = $("html");

                if (window.matchMedia('(prefers-color-scheme: dark)').matches){
                    document.getElementById("toogle").checked = true;
                    if(!html.hasClass("dark")){
                        $("html").addClass("dark");
                    }
                }

                function toogleDarkMode (){
                    if (document.getElementById("toogle").checked == true){
                        if(!html.hasClass("dark")){
                            $("html").addClass("dark");
                        }
                    }else if (document.getElementById("toogle").checked == false){
                        $("html").removeClass("dark");
                    }
                }

                toogleDarkMode();
                document.getElementById("toogle").addEventListener("click", toogleDarkMode);

            });
        </script>
        <style>
            input{
                color: black;
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-base dark:bg-gray-800 min-w-max">

            <!-- Page Heading -->
            <x-header-user />

            <!-- Page Content -->
            <main>
                {{ $slot ?? '' }}
            </main>

            <x-footer-user />
        </div>
    </body>
</html>
