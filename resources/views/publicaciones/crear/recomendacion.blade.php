@extends('layouts.sesion')

@section('contenido')
    <div class="flex flex-col justify-center items-center pb-4">
        <form action="{{route('publicacion.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <x-input-label for="titulo">Título de la publicación</x-input-label>
            <x-text-input class="block mt-1 w-full" type="text" name="titulo"/>
            <x-input-error class="mt-2" :messages="$errors->get('titulo')"/><br>

            <x-input-label for="texto">Contenido de la publicación</x-input-label>
            <textarea class="block mt-1 w-full" name="texto"></textarea>
            <x-input-error class="mt-2" :messages="$errors->get('texto')"/><br>

            <x-input-label for="img">Imagen de la publicación</x-input-label>
            <input type="file" name="img" accept=".png" class="block mt-1 w-full" required/>
            <x-input-error class="mt-2" :messages="$errors->get('img')"/><br>

            <input type="text" name="tipo" value="recomendacion" hidden>

            <div class="flex justify-between">
                <a class="btn  btn-sm glass bg-gray-300 hover:bg-gray-400 text-black" href="{{route('usuario.index')}}">Cancelar</a>
                <input type="submit" class="btn  btn-sm glass bg-gray-300 hover:bg-gray-400 text-black" value="Aceptar">
            </div>
        </form>
    </div>
@endsection

@section('h1')
    Crear Recomendación
@endsection

@section('titulo')
    Crear Recomendación
@endsection
