@extends('layouts.app')

@section('titulo')
    Perfil: {{ $user->username }}
@endsection


@section('contenido')
    <div class="flex justify-center">
        <div class="w-full sm-md:w-8/12 lg:w-6/12 flex flex-col items-center md:flex-row">
            <div class="w-8/12 lg:w-6/12 px-5">
                <img src="{{ asset('img/usuario.svg') }}" alt="Imagen Usuario">
            </div>

            <div class="md:w-8/12 lg:w-6/12 px-5 flex flex-col items-center md:justify-center md:items-start py-10 md:py-10">
                <p class="text-gray-700 text-2xl">
                    {{-- {{ auth()->user()->username }} --}}
                    {{ $user->username }}
                </p>

                <p class="text-gray-800 text-sm mb-3 font-bold mt-5">
                    0<span class="font-normal">Seguidores</span>
                </p>

                <p class="text-gray-800 text-sm mb-3 font-bold">
                    0<span class="font-normal">Siguiendo</span>
                </p>

                <p class="text-gray-800 text-sm mb-3 font-bold">
                    0<span class="font-normal">Post</span>
                </p>
            </div>
        </div>
    </div>

    <section class="container mx-auto mt-10">
        <h2 class="text-3xl text-center font-black my-10">Publicaciones</h2>

        {{-- {{ dd($user->posts) }} --}}

        {{-- @if ($user->posts->count()) --}}

        @if ($posts->count())
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                {{-- Recorremos los posts --}}
                {{-- @dd($posts) --}}
                {{-- @foreach ($user->posts as $post) --}}
                @foreach ($posts as $post)
                    <div class="mb-10">
                        <a href="">
                            <img src="{{ asset('uploads') . '/' . $post->imagen }}" alt="Imagen del post {{ $post->titulo }}">
                        </a>
                    </div>
                @endforeach
            </div>

            <div class="my-10">
                {{ $posts->links('pagination::tailwind') }}
            </div>

        @else
            <p class="text-gray-600 uppercase text-sm text-center font-bold">No hay posts</p>
        @endif
    </section>
@endsection
