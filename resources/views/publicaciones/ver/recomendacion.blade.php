@extends("layouts.publicacion")

@section("contenido")
    <a class="btn" href="{{url()->previous()}}">Atrás</a>
    <h2 class="text-3xl">{{$publicacion->titulo}}</h2>
    <img src="{{$media}}" alt="imagen de la recomendación" />
    <p>
        {{$publicacion->texto}}
    </p>
    <div class="flex justify-between">
        <div>
            @auth()
                @if(App\Http\Controllers\PublicacionController::estaGuardada($publicacion->id,auth()->user()->id))
                    <a href="{{route('publicacion.guardar',$publicacion->id)}}" class="btn">Quitar de Guardados</a>
                @else
                    <a href="{{route('publicacion.guardar',$publicacion->id)}}" class="btn">Guardar</a>
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
