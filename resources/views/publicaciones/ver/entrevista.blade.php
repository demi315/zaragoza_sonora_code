@extends("layouts.publicacion")

@section("contenido")
    <a class="btn" href="{{url()->previous()}}">Atrás</a>
    <h2 class="text-3xl">{{$publicacion->titulo}}</h2>
    <video controls>
        <source src="{{$media}}" type="video/mp4">
        Your browser does not support the video tag
    </video>
    <p>
        {{$publicacion->texto}}
    </p>
    <div class="flex justify-between">
        <div>
            @auth()
                @if(auth()->user()->admin == 1)
                    <a class="btn" href="{{route('publicacion.edit',$publicacion->id)}}">Editar</a>
                @endif
            @endauth
        </div>
        <div>
            @auth()
                @if(auth()->user()->admin == 0)
                    <h3 class="btn">Guardar</h3>
                @endif
            @endauth
        </div>
    </div>
@endsection
@section("titulo")
    {{$publicacion->titulo}}
@endsection
