@extends("layouts.listado")

@section("contenido")
    <div id="filtros" class="mt-3 mb-1">
        <form method="post" action="{{route('publicacion.filtros')}}" class="flex flex-row justify-around items-center">
            @csrf
            <div>Título <input type="text" name="titulo"></div>

            <div>Orden
            <select name="orden">
                <option value="DESC" selected>Más nuevas primero</option>
                <option value="ASC">Más antiguas primero</option>
            </select></div>
            <input type="text" name="tipo" value="{{$tipo}}" hidden>
            <input type="submit" name="submit" class="btn glass bg-gray-300 hover:bg-gray-400 text-black" value="Aplicar Filtros">
        </form>
    </div>
    <div class="flex flex-col justify-center items-center pb-4">
    @foreach($publicaciones as $publicacion)
        <div class="flex flex-row justify-center items-center border-2 border-white mt-2 w-5/6"><a href="{{route('publicacion.show',$publicacion->id)}}" class="w-full">
            <img src="{{$publicacion->media}}" style="display: inline-block" class="w-[177.8px] h-[100px]" alt="picture for the post {{$publicacion->titulo}}">
            <div style="display: inline-block" class="ml-2">
                <h3 class="text-2xl font-bold">{{$publicacion->titulo}}</h3>
                <p>{{$publicacion->texto}}</p>
            </div>
        </a></div>
    @endforeach
    </div>
@endsection

@section('h1')
    @switch($tipo)
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
