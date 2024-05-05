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

                <x-input-label for="fch">Fecha de realización del evento</x-input-label>
                <input type="datetime-local" name="fch" max="9999-12-31T23:59" value="{{$publicacion->fecha}}"/>
                <x-input-error class="mt-2" :messages="$errors->get('fch')"/><br>

                <x-input-label for="img">Imagen de la publicación</x-input-label>
                <input type="file" name="img" accept=".png" class="block mt-1 w-full"/>
                <x-input-error class="mt-2" :messages="$errors->get('img')"/><br>

                <input type="text" name="tipo" value="evento" hidden>

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
    Editar Evento
@endsection

@section('titulo')
    Editar Evento
@endsection
