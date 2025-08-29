@extends('layouts.app')

@section('titulo')
    Crea una nueva publicación
@endsection

@section('contenido')
    <div class="md:flex md:items-center">
        <div class="md:w-1/2 px-10">
            img aqui
        </div>

        <div class="md:w-1/2 bg-white p-10 rounded-lg shadow-xl mt-10 md:mt-0">
            <form action="{{ route('register') }}" method="POST" novalidate>
                {{-- csrf: genera un campo oculto para evitar ataques, directiva de LARAVEL --}}
                @csrf

                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">Nombre</label>

                    <input
                        type="text"
                        name="name"
                        id="name"
                        placeholder="Tu Nombre..."
                        {{-- El error, resaltará solo si existe un error, va de la mano con la directiva: error que esta debajo --}}
                        class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"
                        {{-- Para mantener el valor ingresado en el INPUT --}}
                        value="{{ old('name') }}"
                    >

                    @error('name')
                        {{-- Mensaje estático --}}
                        {{-- <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">El Nombre es Obligatorio</p> --}}

                        {{-- Mensaje dinámico --}}
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>
            </form>
        </div>
    </div>
@endsection
