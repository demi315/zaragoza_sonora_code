@extends("layouts.publicacion")

@section("contenido")
    <a class="btn glass bg-gray-300 hover:bg-gray-400 text-black ml-4" href="{{url()->previous()}}">Atrás</a>
    <div class="flex flex-col justify-center items-center pb-4">
        <h2 class="text-3xl font-bold mb-3">{{$publicacion->titulo}}</h2>
        <h3 class="text-2xl">{{$media[1]}}</h3>
        <img src="{{$media[0]}}" class="w-[500px] h-[281px] mb-3" alt="imagen de la reseña" />
        <p style="overflow-wrap: break-word; max-width: 500px" class="text-justify">
            {{$publicacion->texto}}
        </p>
    </div>
    <div class="flex justify-around p-6">
        <div>
            @auth()
                @if(auth()->user()->admin == 1)
                    <a class="btn  btn-sm glass bg-gray-300 hover:bg-gray-400 text-black" href="{{route('publicacion.edit',$publicacion->id)}}">Editar</a>
                @endif
            @endauth
        </div>
        <div>
            @auth()
                @if(App\Http\Controllers\PublicacionController::estaGuardada($publicacion->id,auth()->user()->id))
                    <a href="{{route('publicacion.guardar',$publicacion->id)}}" class="btn  btn-sm glass bg-gray-300 hover:bg-gray-400 text-black">Quitar de Guardados</a>
                @else
                    <a href="{{route('publicacion.guardar',$publicacion->id)}}" class="btn  btn-sm glass bg-gray-300 hover:bg-gray-400 text-black">Guardar</a>
                @endif
            @endauth
        </div>
    </div>
@endsection
@section("titulo")
    {{$publicacion->titulo}}
@endsection
