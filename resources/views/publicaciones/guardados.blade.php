@extends("layouts.calendario")

@section("contenido")
    <a class="btn" href="{{url()->previous()}}">Atrás</a>
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
    Publicaciones Guardadas
@endsection
@section("titulo")
    Publicaciones Guardadas
@endsection
