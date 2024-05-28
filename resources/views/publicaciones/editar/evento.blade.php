@extends('layouts.sesion')

@section('contenido')
    <div class="flex flex-col justify-center items-center pb-4">
        <form action="{{route('publicacion.update',$publicacion->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PATCH")
            <x-input-label for="titulo">Título de la publicación</x-input-label>
            <x-text-input class="block mt-1 w-full" type="text" name="titulo" value="{{$publicacion->titulo}}"/>
            <x-input-error class="mt-2" :messages="$errors->get('titulo')"/><br>

            <x-input-label for="texto">Contenido de la publicación</x-input-label>
            <textarea class="block mt-1 w-full" name="texto">{{$publicacion->texto}}</textarea>
            <x-input-error class="mt-2" :messages="$errors->get('texto')"/><br>

            <x-input-label for="fch">Fecha de realización del evento</x-input-label>
            <input class="block mt-1 w-full" type="datetime-local" name="fch" max="9999-12-31T23:59" value="{{$publicacion->fecha}}"/>
            <x-input-error class="mt-2" :messages="$errors->get('fch')"/><br>

            <x-input-label for="img">Imagen de la publicación</x-input-label>
            <input type="file" name="img" accept=".png" class="block mt-1 w-full"/>
            <x-input-error class="mt-2" :messages="$errors->get('img')"/><br>

            <input type="text" name="tipo" value="evento" hidden>

            <div class="flex justify-between">
                <a class="btn  btn-sm glass bg-gray-300 hover:bg-gray-400 text-black" href="{{route('usuario.index')}}">Cancelar</a>
                <input type="submit" class="btn  btn-sm glass bg-gray-300 hover:bg-gray-400 text-black" value="Aceptar">
            </div>
        </form>
        <form action="{{route("publicacion.destroy", $publicacion->id)}}" method="POST" class="mt-6">
            @csrf
            @method("DELETE")
            <input type="submit" class="btn bg-red-600 hover:bg-red-700 text-black" value="ELIMINAR PUBLICACIÓN">
        </form>
    </div>
@endsection

@section('h1')
    Editar Evento
@endsection

@section('titulo')
    Editar Evento
@endsection
