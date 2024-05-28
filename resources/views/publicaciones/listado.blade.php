@extends("layouts.listado")

@section("contenido")
    <div id="filtros">
        <details>
            <summary>Filtros</summary>
            <form method="post" action="{{route('publicacion.filtros')}}">
                @csrf
                Título <input type="text" name="titulo">

                Orden
                <select name="orden">
                    <option value="DESC" selected>Más nuevas primero</option>
                    <option value="ASC">Más antiguas primero</option>
                </select>
                <input type="text" name="tipo" value="{{$publicaciones[0]->tipo}}" hidden>
                <input type="submit" name="submit" value="Aplicar Filtros" class="btn">
            </form>
        </details>
    </div>
    @foreach($publicaciones as $publicacion)
        <a href="{{route('publicacion.show',$publicacion->id)}}"><div class="border-2 border-green-700">
            <img src="{{$publicacion->media}}" height="150px" width="150px" style="display: inline-block" alt="picture for the post {{$publicacion->titulo}}">
            <div style="display: inline-block">
                <h3>{{$publicacion->titulo}}</h3>
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
