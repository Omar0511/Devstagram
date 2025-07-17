<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Devstagram - @yield('titulo')</title>
        {{-- Se agrega para poder usar los estilos de TAILWINDCSS --}}
        @vite('resources/css/app.css')
    </head>
    <body>
        
    </body>
</html>
