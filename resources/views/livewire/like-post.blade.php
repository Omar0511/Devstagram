<div>
    {{-- Success is as dangerous as failure. --}}
    {{-- <h1>Hola Livewire</h1> --}}

    {{-- Pasando e imprimiendo el valor de una variable de LIVEWIRE --}}
    {{-- <h1>{{ $mensaje }}</h1> --}}

    {{-- <h1>{{ $post->titulo }}</h1> --}}

    {{-- <button type="submit"> --}}

    <div class="flex gap-2 items-center">
        <button wire:click="like">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                {{-- fill="red" --}}
                fill="{{ $isLiked ? 'red' : 'none' }}"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="size-6"
            >
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
            </svg>
        </button>

        {{-- {{  $isLiked }} --}}

        {{-- En LIVEWIRE siempre el código HTML debe estar dentro de un DIV --}}
        <p class="font-bold">
            {{-- {{ $post->likes->count() }} --}}
            {{ $likes }}

            <span class="font-normal">Likes</span>

            {{-- Para usar variables en las VISTAS con LIVWWIRE --}}
            {{-- @php
                $mensaje = "Hola desde Livewire";
            @endphp --}}

            {{-- Llamando a un componente LIVEWIRE --}}
            {{-- <livewire:like-post :mensaje="$mensaje" /> --}}

            {{-- <livewire:like-post :post="$post" /> --}}
        </p>
    </div>
</div>
