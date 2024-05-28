@extends("layouts.usuario")

@section('nombre_usuario')
    {{$usuario->name}}
@endsection

@section('contenido')
    <div class="flex flex-row items-center pb-4">
        <img src="{{$usuario->pfp}}" class="w-[150px] h-[150px] ml-32" alt="imagen de la reseña" />
        <div class="flex flex-col justify-center items-center pb-4 ml-72">
            <h3 class="text-2xl mb-4">Sobre mí</h3>
            <p style="overflow-wrap: break-word; max-width: 500px" class="text-justify">{{$usuario->info}}</p>
        </div>
    </div>
    <div class="flex flex-row justify-around items-center pb-4 mt-20">
        <a href="{{route('usuario.guardados',auth()->user())}}" class="btn glass bg-gray-300 hover:bg-gray-400 text-black">Publicaciones Guardadas</a>
        <a href="{{route('usuario.calendario',auth()->user())}}" class="btn glass bg-gray-300 hover:bg-gray-400 text-black">Calendario de Eventos</a>
        <a href="{{route('profile.edit',auth()->user())}}" class="btn glass bg-gray-300 hover:bg-gray-400 text-black">Editar perfil</a>
        @if(auth()->user()->admin == 1)
            <a class="btn glass bg-gray-300 hover:bg-gray-400 text-black" href="{{route('publicacion.create')}}">Crear Publicacion</a>
        @endif
    </div>
@endsection

@section('titulo')
    Perfil de {{$usuario->name}}
@endsection
