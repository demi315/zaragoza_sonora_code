@extends('layouts.sesion')

@section('contenido')
    <a href="{{route('publicacion.crear','resena')}}" class="btn">Reseña</a>
    <a href="{{route('publicacion.crear','entrevista')}}" class="btn">Entrevista</a>
    <a href="{{route('publicacion.crear','evento')}}" class="btn">Evento</a>
    <a href="{{route('publicacion.crear','recomendacion')}}" class="btn">Recomendación</a>
@endsection

@section('h1')
    Crear Publicación
@endsection

@section('titulo')
    Elegir Tipo Publicación
@endsection
