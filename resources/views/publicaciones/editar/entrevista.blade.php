@extends('layouts.sesion')

@section('contenido')
    <div class="flex items-center justify-center h-full p-5 rounded-2xl">
        <div class="w-full max-w-md h-full">
            <form action="{{route('publicacion.update',$publicacion->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PATCH")
                <x-input-label for="titulo">Título de la publicación</x-input-label>
                <x-text-input type="text" name="titulo" value="{{$publicacion->titulo}}"/>
                <x-input-error class="mt-2" :messages="$errors->get('titulo')"/><br>

                <x-input-label for="texto">Contenido de la publicación</x-input-label>
                <textarea name="texto">{{$publicacion->texto}}</textarea>
                <x-input-error class="mt-2" :messages="$errors->get('texto')"/><br>

                <x-input-label for="vid">Imagen de la publicación</x-input-label>
                <input type="file" name="vid" accept=".mp4" class="block mt-1 w-full"/>
                <x-input-error class="mt-2" :messages="$errors->get('vid')"/><br>

                <input type="text" name="tipo" value="entrevista" hidden>

                <div class="flex justify-between">
                    <a class="btn" href="{{route('publicacion.show',$publicacion->id)}}">Cancelar</a>
                    <x-primary-button>Aceptar</x-primary-button>
                </div>
            </form>
            <form action="{{route("publicacion.destroy", $publicacion->id)}}" method="POST">
                @csrf
                @method("DELETE")
                <x-primary-button>Eliminar Publicación</x-primary-button>
            </form>
@endsection

@section('h1')
    Editar Entrevista
@endsection

@section('titulo')
    Editar Entrevista
@endsection
