<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Devstagram - @yield('titulo')</title>
        {{-- Se agrega para poder usar los estilos de TAILWINDCSS --}}
        {{-- @vite('resources/css/app.css') --}}
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="bg-gray-100">
        <header class="p-5 border-b bg-white shadow">
            <div class="container mx-auto flex justify-between items-center">
                <h1 class="text-3xl font-black">DevStagram</h1>

                {{-- Validar si un usuario esta autenticado --}}
                {{-- @if (auth()->user())
                    <p>Autenticado</p>
                @else
                    <p>No Autenticado</p>
                @endif --}}

                {{-- Otra opción --}}
                @auth
                    <nav class="flex gap-2 items-center">
                        <a class="font-bold uppercase text-gray-600 text-sm" href="/login">
                            Hola: <span class="font-normal">{{ auth()->user()->username }}</span>
                        </a>

                        {{-- Cuando agregamos NAME en el ROUTE (web.php), cambiamos a ROUTE --}}
                        <form method="POST" action="{{ route('logout') }}">
                            {{-- <a class="font-bold uppercase text-gray-600 text-sm" href="{{ route('logout') }}">
                                Cerrar Sesión
                            </a> --}}

                            {{-- Evitamos ataques --}}
                            @csrf
                            <button type="submit" class="font-bold uppercase text-gray-600 text-sm">Cerrar Sesión</button>
                        </form>
                    </nav>
                @endauth

                @guest
                    <nav class="flex gap-2 items-center">
                        <a class="font-bold uppercase text-gray-600 text-sm" href="/login">Login</a>
                        {{-- <a class="font-bold uppercase text-gray-600 text-sm" href="/register">Crear Cuenta</a> --}}

                        {{-- Cuando agregamos NAME en el ROUTE (web.php), cambiamos a ROUTE --}}
                        <a class="font-bold uppercase text-gray-600 text-sm" href="{{ route('register') }}">Crear Cuenta</a>
                    </nav>
                @endguest
            </div>
        </header>

        <main class="container mx-auto mt-10">
            <h2 class="font-black text-center text-3xl mb-10">@yield('titulo')</h2>

            @yield('contenido')
        </main>

        <footer class="mt-10 text-center p-5 text-gray-500 font-bold uppercase">
            DevStagra - Todos los derechos reservados
            {{-- Puede ser esta forma --}}
            {{-- @php echo date('Y') @endphp --}}

            {{-- Oh esta otra forma, (más recomendada), se le conoce como DIRECTIVAS --}}
            {{ now()->year }}
        </footer>
    </body>
</html>
