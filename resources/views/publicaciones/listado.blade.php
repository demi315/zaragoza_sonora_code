@extends("layouts.listado")

@section("contenido")
    @foreach($publicaciones as $publicacion)
        <a href="{{route('publicacion.show',$publicacion->id)}}"><div class="border-2 border-green-700">
            <img src="{{asset("images/ZS_Logo_Negro.png")}}" height="150px" width="150px" style="display: inline-block" alt="picture for the post {{$publicacion->titulo}}">
            <div style="display: inline-block">
                <h3>{{$publicacion->titulo}}</h3>
                <p>{{$publicacion->texto}}</p>
            </div>
        </div></a>
    @endforeach
@endsection

@section('h1')
    @switch($publicaciones[0]->tipo)
        @case('resena')
            {{$tipo = 'Reseñas'}}
            @break
        @case('recomendacion')
            {{$tipo = 'Recomendaciones'}}
            @break
        @case('entrevista')
            {{$tipo = 'Entrevistas'}}
            @break
        @case('evento')
            {{$tipo = 'Eventos'}}
            @break
    @endswitch
@endsection
@section("titulo")
    {{$tipo}}
@endsection
