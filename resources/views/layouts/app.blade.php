<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Devstagram - @yield('titulo')</title>
    </head>
    <body>
        <nav>
            <a href="/">Principal</a>
            <a href="/nosotros">Nostros</a>
        </nav>

        {{-- Yield: lo registra como Contenedor para usarlo en otro archivo y que sea dinámico --}}
        <h1>@yield('titulo')</h1>

        <hr>

        <h2>@yield('contenido')</h2>
    </body>
</html>
