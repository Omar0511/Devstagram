{{-- Directivas --}}
@extends('layouts.app')

{{-- Usando el Yield del app.blade.php --}}
@section('titulo')
    Página Principal
@endsection

@section('contenido')
    @if ($posts->count())
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
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

    {{-- Lo mismo pero con una DIRECTIVA de LARAVEL --}}
    {{-- @forelse ($posts as $post)
        <h1>{{ $post->titulo }}</h1>
    @empty
        <p>No hay Posts</p>
    @endforelse --}}
@endsection
