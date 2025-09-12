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

            @auth
                @if ($post->user_id === auth()->user()->id)
                    {{-- <p class="font-bold text-gray-600 mt-10">Tú eres el dueño de esta publicación</p> --}}

                    {{-- Formulario para eliminar --}}
                    {{-- El action va a la ruta que creamos en web.php --}}
                    {{-- El method debe ser POST, pero con @method('DELETE') indicamos que es DELETE --}}
                    <form action="{{ route('posts.destroy', $post) }}" method="POST">
                        @csrf
                        {{-- Se le conoce como método SPOOFING, el cual permite agregar otros métodos, ya que el navegador navitcamente contiene los métodos: GET y POST --}}
                        @method('DELETE')

                        <input
                            type="submit"
                            value="Eliminar Publicación"
                            class="bg-red-500 hover:bg-red-600 p-2 rounded text-white font-bold mt-4 cursor-pointer"
                        />
                    </form>
                @endif
            @endauth
        </div>
        <div class="md:w-1/2 p-5">
            <div class="shadow bg-white p-5 mb-5">
                @auth
                    {{-- Comentarios --}}
                    <p class="text-xl font-bold text-center mb-4">Agrega un Nuevo Comentario</p>

                    @if (session('mensaje'))
                        <div class="bg-green-500 p-2 rounded-lg mb-6 text-white text-center uppercase font-bold">
                            {{ session('mensaje') }}
                        </div>
                    @endif

                    <form action="{{ route('comentarios.store', ['user' => $post->user, 'post' => $post]) }}" method="POST">
                        @csrf
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
                @endauth

                <div class="bg-white shadow mb-5 max-h-96 overflow-y-scroll mt-10">
                    @if ($post->comentarios->count())
                        @foreach ($post->comentarios as $comentario)
                            <div class="p-5 border-gray-300 border-b">
                                <a href="{{ route('posts.index', $comentario->user) }}" class="font-bold">
                                    {{ $comentario->user->username }}
                                </a>

                                <p>{{ $comentario->comentario }}</p>

                                <p class="text-sm text-gray-500">{{ $comentario->created_at->diffForHumans() }}</p>
                            </div>
                        @endforeach
                    @else
                        <p class="p-10 text-center">No Hy Comentarios Aún</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection
