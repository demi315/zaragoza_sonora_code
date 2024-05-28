@extends("layouts.usuario")

@section('nombre_usuario')
    {{$usuario->name}}
@endsection

@section('contenido')
    <p>{{$usuario->info}}</p>
    <div>
        <a href="{{route('usuario.guardados',auth()->user())}}" class="btn">Publicaciones Guardadas</a>
        <a href="{{route('usuario.calendario',auth()->user())}}" class="btn">Calendario de Eventos</a>
        <a href="{{route('profile.edit',auth()->user())}}" class="btn  btn-sm  btn-primary">Editar perfil</a>
    </div>
    @if(auth()->user()->admin == 1)
        <a class="btn" href="{{route('publicacion.create')}}">Crear Publicacion</a>
    @endif
@endsection

@section('titulo')
    Perfil de {{$usuario->name}}
@endsection
