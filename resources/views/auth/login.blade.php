@extends('layouts.app')


@section('titulo')
    Inicia Sesión en Devstagram
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-6/12 p-5">
            <img src="{{ asset('img/login.jpg') }}" alt="Imagen Login de usuarios">
        </div>

        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            {{-- <form action="/register" method="POST">, cambiamos cuando en web.php usamos el NAME --}}
                {{-- novalidate: se recomienda deshabilitarlo, es la validación de HTML5 --}}
                <form action="{{ route('login') }}" method="POST" novalidate>
                {{-- csrf: genera un campo oculto para evitar ataques, directiva de LARAVEL --}}
                @csrf

                {{-- Imprimimos el mensaje que se guardo en el: return back()->with('mensaje', 'Credenciales incorrectas'); del LoginController --}}
                @if (session('mensaje'))
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ session('mensaje') }}</p>
                @endif

                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">Email</label>

                    <input
                        type="email"
                        name="email"
                        id="email"
                        placeholder="Tu Email de Registro..."
                        class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror"
                        value="{{ old('email') }}"
                    >

                    @error('email')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">Password</label>

                    <input
                        type="password"
                        name="password"
                        id="password"
                        placeholder="Tu Password de Registro..."
                        class="border p-3 w-full rounded-lg"
                    >

                    @error('password')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>

                <input
                    type="submit"
                    value="Iniciar Sesión"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"
                >
            </form>
        </div>
    </div>
@endsection
