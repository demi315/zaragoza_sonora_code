@extends('layouts.sesion')

@section('contenido')
    <div class="flex flex-col justify-between items-center mt-24">
    <div class="w-2/4">
        <div class="flex flex-row justify-between items-center w-full">
            <a href="{{route('publicacion.crear','resena')}}" class="btn glass bg-gray-300 hover:bg-gray-400 text-black">Reseña</a>
            <a href="{{route('publicacion.crear','entrevista')}}" class="btn glass bg-gray-300 hover:bg-gray-400 text-black">Entrevista</a>
            <a href="{{route('publicacion.crear','evento')}}" class="btn glass bg-gray-300 hover:bg-gray-400 text-black">Evento</a>
            <a href="{{route('publicacion.crear','recomendacion')}}" class="btn glass bg-gray-300 hover:bg-gray-400 text-black">Recomendación</a>
        </div>
    </div>
    </div>
@endsection

@section('h1')
    Crear Publicación
@endsection

@section('titulo')
    Elegir Tipo Publicación
@endsection
