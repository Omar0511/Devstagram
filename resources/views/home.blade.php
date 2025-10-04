{{-- Directivas --}}
@extends('layouts.app')

{{-- Usando el Yield del app.blade.php --}}
@section('titulo')
    Página Principal
@endsection

@section('contenido')
    @if ($posts->count())
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

            {{-- Estas 3 líneas NO se descomentan al comentar todo el código --}}
            {{-- Recorremos los posts --}}
            {{-- @dd($posts) --}}
            {{-- @foreach ($user->posts as $post) --}}

            @foreach ($posts as $post)
                <div class="mb-10">
                    <a href="{{ route('posts.show', ['post' => $post, 'user' => $post->user]) }}">
                        <img src="{{ asset('uploads') . '/' . $post->imagen }}" alt="Imagen del post {{ $post->titulo }}">
                    </a>
                </div>
            @endforeach
        </div>

        <div class="my-10">
            {{ $posts->links('pagination::tailwind') }}
        </div>
    @else
        <p class="text-center">No hay Posts, sigue a alguien para poder mostrar sus posts</p>
    @endif

    {{-- Estas líneas NO se descomentan al comentar todo el código --}}
    {{-- Lo mismo pero con una DIRECTIVA de LARAVEL --}}
    {{-- @forelse ($posts as $post)
        <h1>{{ $post->titulo }}</h1>
    @empty
        <p>No hay Posts</p>
    @endforelse --}}

    {{-- Agregando y utilizando COMPONENTETES --}}
    {{-- Si lo dejamos en 1 sola línea el COMPONENTE no se podría reutilizar, pero podemos agregar apertura con cierre, con la finalidad de que lo que se agregue dentro de ese BLOQUE, se pase a la vista --}}
    {{-- <x-listar-post />  --}}

    {{-- Ejemplo de como usar SUBSLOT dentro de un SLOT --}}
    {{-- <x-listar-post>
        <x-slot:titulo>
            <header>Desde el HEADER SLOT</header>
        </x-slot:titulo>

        <h1>Mostrando los posts desde slots H1</h1>
    </x-listar-post> --}}
@endsection
