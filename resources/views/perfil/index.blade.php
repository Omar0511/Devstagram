@extends('layouts.app')

@section('titulo')
    Editar Perfil: {{ auth()->user()->username }}
@endsection

@section('contenido')
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadow p-6">
            <form action="" class="mt-10 md:mt-0">
                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">Username</label>

                    <input
                        type="text"
                        name="username"
                        id="username"
                        placeholder="Tu Nomre de Usuario..."
                        {{-- El error, resaltará solo si existe un error, va de la mano con la directiva: error que esta debajo --}}
                        class="border p-3 w-full rounded-lg @error('username') border-red-500 @enderror"
                        {{-- Para mantener el valor ingresado en el INPUT --}}
                        value={{ auth()->user()->username }}"
                    >

                    @error('username')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="imagen" class="mb-2 block uppercase text-gray-500 font-bold">Imagen Perfil</label>

                    <input
                        type="file"
                        name="imagen"
                        id="imagen"
                        placeholder="Tu Nomre de Usuario..."
                        {{-- El error, resaltará solo si existe un error, va de la mano con la directiva: error que esta debajo --}}
                        class="border p-3 w-full rounded-lg"
                        {{-- Para mantener el valor ingresado en el INPUT --}}
                        value=""
                        accept=".jpg, .jpeg, .png"
                    >

                    @error('imagen')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>

                <input
                    type="submit"
                    value="Guardar Canbios"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"
                >
            </form>
        </div>
    </div>
@endsection


