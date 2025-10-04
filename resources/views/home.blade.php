{{-- Directivas --}}
@extends('layouts.app')

{{-- Usando el Yield del app.blade.php --}}
@section('titulo')
    Página Principal
@endsection

@section('contenido')
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

    {{-- Pasando variables al COMPONENTE, viene desde el HOME --}}
    <x-listar-post :posts="$posts" />
@endsection
