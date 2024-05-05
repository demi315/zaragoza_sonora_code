@extends("layouts.usuario")

@section('nombre_usuario')
    {{$usuario->name}}
@endsection

@section('contenido')
    <p>{{$usuario->info}}</p>
    <div>
        <a href="#" class="btn">Publicaciones Guardadas</a>
        <a href="#" class="btn">Calendario</a>
        <a href="{{route('profile.edit',auth()->user())}}" class="btn  btn-sm  btn-primary">Editar perfil</a>
    </div>
    @auth()
        @if(auth()->user()->admin == 1)
            <a class="btn" href="{{route('publicacion.create')}}">Crear Publicacion</a>
        @endif
    @endauth
@endsection

