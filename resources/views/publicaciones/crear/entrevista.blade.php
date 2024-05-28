@extends('layouts.sesion')

@section('contenido')
    <div class="flex items-center justify-center h-full p-5 rounded-2xl">
        <div class="w-full max-w-md h-full">
            <form action="{{route('publicacion.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <x-input-label for="titulo">Título de la publicación</x-input-label>
                <x-text-input type="text" name="titulo"/>
                <x-input-error class="mt-2" :messages="$errors->get('titulo')"/><br>

                <x-input-label for="texto">Contenido de la publicación</x-input-label>
                <textarea name="texto"></textarea>
                <x-input-error class="mt-2" :messages="$errors->get('texto')"/><br>

                <x-input-label for="vid">Video de la publicación</x-input-label>
                <input type="file" name="vid" accept=".mp4" class="block mt-1 w-full"/>
                <x-input-error class="mt-2" :messages="$errors->get('vid')"/><br>

                <x-input-label for="img">Imagen de la publicación</x-input-label>
                <input type="file" name="img" accept=".png" class="block mt-1 w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('img')"/><br>

                <input type="text" name="tipo" value="entrevista" hidden>

                <div class="flex justify-between">
                    <a class="btn" href="{{route('usuario.index')}}">Cancelar</a>
                    <x-primary-button>Aceptar</x-primary-button>
                </div>
            </form>
@endsection

@section('h1')
    Crear Entrevista
@endsection

@section('titulo')
    Crear Entrevista
@endsection
