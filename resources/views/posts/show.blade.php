@extends('layouts.app')

@section(('titulo'))
    {{ $post->titulo }}
@endsection

@section('contenido')
    <div class="container mx-auto md:flex">
        <div class="md:w-1/2">
            <img src="{{ asset('uploads') . '/' . $post->imagen }}" alt="Imagen del p">

            <div class="p-3">
                <p>0 Likes</p>
            </div>

            <div>
                <p class="font-bold">{{ $post->user->username }}</p>

                {{-- <p class="text-sm text-gray-500">{{ $post->created_at }}</p> --}}
                <p class="text-sm text-gray-500">{{ $post->created_at->diffForHumans() }}</p>

                <p class="mt-5">{{ $post->descripcion }}</p>
            </div>
        </div>
        <div class="md:w-1/2 p-5">
            <div class="shadow bg-white p-5 mb-5">
                {{-- Comentarios --}}
                <p class="text-xl font-bold text-center mb-4">Agrega un Nuevo Comentario</p>


                <form action="">
                    <div class="mb-5">
                        <label for="comentario" class="mb-2 block uppercase text-gray-500 font-bold">Añade un Comentario</label>

                        <textarea
                            name="comentario"
                            id="comentario"
                            placeholder="Agrega un Comentario..."
                            {{-- El error, resaltará solo si existe un error, va de la mano con la directiva: error que esta debajo --}}
                            class="border p-3 w-full rounded-lg @error('comentario') border-red-500 @enderror"
                        ></textarea>

                        @error('comentario')
                            {{-- Mensaje estático --}}
                            {{-- <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">El Nombre es Obligatorio</p> --}}

                            {{-- Mensaje dinámico --}}
                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                        @enderror
                    </div>

                    <input
                        type="submit"
                        value="Comentar"
                        class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"
                    >
                </form>
            </div>
        </div>
    </div>
@endsection
