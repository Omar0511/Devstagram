@extends('layouts.app')

@section('titulo')
    Crea una nueva publicación
@endsection

{{-- Va de la manos con STACK que esta en app.balde.php --}}
@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('contenido')
    <div class="md:flex md:items-center">
        <div class="md:w-1/2 px-10">
            <form id="dropzone" action="{{ route('imagenes.store') }}" class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center" method="POST" enctype="multipart/form-data">
                @csrf
            </form>
        </div>

        <div class="md:w-1/2 bg-white p-10 rounded-lg shadow-xl mt-10 md:mt-0">
            <form action="{{ route('posts.store') }}" method="POST" novalidate>
                {{-- csrf: genera un campo oculto para evitar ataques, directiva de LARAVEL --}}
                @csrf

                <div class="mb-5">
                    <label for="titulo" class="mb-2 block uppercase text-gray-500 font-bold">Título</label>

                    <input
                        type="text"
                        name="titulo"
                        id="titulo"
                        placeholder="Tu Titulo de la Publicación..."
                        {{-- El error, resaltará solo si existe un error, va de la mano con la directiva: error que esta debajo --}}
                        class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"
                        {{-- Para mantener el valor ingresado en el INPUT --}}
                        value="{{ old('name') }}"
                    >

                    @error('titulo')
                        {{-- Mensaje estático --}}
                        {{-- <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">El Nombre es Obligatorio</p> --}}

                        {{-- Mensaje dinámico --}}
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="descripcion" class="mb-2 block uppercase text-gray-500 font-bold">Dscripción</label>

                    <textarea
                        name="descripcion"
                        id="descripcion"
                        placeholder="Tu Descripción de la Publicación..."
                        {{-- El error, resaltará solo si existe un error, va de la mano con la directiva: error que esta debajo --}}
                        class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"
                    >{{ old('descripcion') }}</textarea>

                    @error('descripcion')
                        {{-- Mensaje estático --}}
                        {{-- <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">El Nombre es Obligatorio</p> --}}

                        {{-- Mensaje dinámico --}}
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>

                <input
                    type="submit"
                    value="Crear Publicación"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"
                >
            </form>
        </div>
    </div>
@endsection
