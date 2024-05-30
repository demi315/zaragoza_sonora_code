@extends("layouts.publicacion")

@section("contenido")
    <a class="btn glass bg-gray-300 hover:bg-gray-400 text-black ml-4" href="{{url()->previous()}}">Atrás</a>
    <div class="flex flex-col justify-center items-center pb-4">
        <h2 class="text-3xl font-bold mb-3">{{$publicacion->titulo}}</h2>
        <img src="{{$media}}" class="w-[500px] h-[281px] mb-3" alt="imagen de la reseña" />
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
    <div id="comentarios" class="flex flex-row justify-center items-center pb-4 ">
    <div class="flex flex-col justify-center items-center w-3/4 p-0">
        @auth()
            <div class="flex flex-col justify-center items-center mb-3 w-full">
            <h3 class="text-2xl">¡¡Deja tu comentario!!</h3>
            <form action="{{route('comentario.store')}}" method="post" class="w-3/4">
                @csrf
                <textarea name="contenido" class="mt-1 mb-2 w-full"></textarea>
                <x-input-error class="mt-2" :messages="$errors->get('contenido')"/><br>
                <input hidden type="number" value="{{$publicacion->id}}" name="id_pub">
                <input hidden type="number" value="{{auth()->user()->id}}" name="id_us">
                <input class="btn btn-sm glass bg-gray-300 hover:bg-gray-400 text-black" type="submit" value="Publicar Comentario">
            </form>
            </div>
        @endauth
        <div class="w-3/4">
            <h3 class="text-2xl mb-2 mt-3">Comentarios de la publicación</h3>
            @if(sizeof($comentarios) == 0) <h4 class="text-xl">Parece que esta publicación aún no tiene comentarios...</h4>@endif
            <div class="pl-8">
            @foreach($comentarios as $comentario)
                <div>
                    <h4 class="text-xl">{{\Illuminate\Support\Facades\DB::select('select name from users where id = '.$comentario->id_us)[0]->name}} <span style="font-size: 0.75rem" >{{$comentario->created_at}}</span></h4>
                    <p class="pl-4">{{$comentario->contenido}}</p>
                    <hr >
                </div>
            @endforeach
            </div>
        </div>
    </div>
    </div>
@endsection
@section("titulo")
    {{$publicacion->titulo}}
@endsection
