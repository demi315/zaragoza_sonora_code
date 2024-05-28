@extends("layouts.calendario")

@section("contenido")
    <a class="btn glass bg-gray-300 hover:bg-gray-400 text-black ml-4" href="{{url()->previous()}}">Atrás</a>
    <div class="flex flex-col justify-center items-center pb-4">
    @if($publicaciones == null)
        <h2 class="text-2xl ">No tienes publicaciones guardadas todavía...</h2>
    @endif
    @foreach($publicaciones as $publicacion)
            <div class="flex flex-row justify-center items-center border-2 border-white mt-2 w-5/6"><a href="{{route('publicacion.show',$publicacion->id)}}" class="w-full">
                <img src="{{$publicacion->media}}" class="w-[177.8px] h-[100px]" style="display: inline-block" alt="picture for the post {{$publicacion->titulo}}">
                <div style="display: inline-block" class="ml-2">
                    <h3 class="text-2xl font-bold">{{$publicacion->titulo}}</h3>
                    <p>{{$publicacion->texto}}</p>
                </div>
            </a></div>
    @endforeach
    </div>
@endsection

@section('h1')
    Publicaciones Guardadas
@endsection
@section("titulo")
    Publicaciones Guardadas
@endsection
