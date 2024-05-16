@extends("layouts.publicacion")

@section("contenido")
    <a class="btn" href="{{url()->previous()}}">Atrás</a>
    <h2 class="text-3xl">{{$publicacion->titulo}}</h2>
    <img src="{{$media}}" alt="imagen de la reseña" />
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
                @if(App\Http\Controllers\PublicacionController::estaGuardada($publicacion->id,auth()->user()->id))
                    <a href="{{route('publicacion.guardar',$publicacion->id)}}" class="btn">Quitar de Guardados</a>
                @else
                    <a href="{{route('publicacion.guardar',$publicacion->id)}}" class="btn">Guardar</a>
                @endif
            @endauth
        </div>
    </div>
@endsection
@section("titulo")
    {{$publicacion->titulo}}
@endsection
