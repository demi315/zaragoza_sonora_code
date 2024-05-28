@extends("layouts.layout")

@section("contenido")
    <div class="flex flex-col justify-center items-center pb-8">
    <div class="flex flex-row justify-around items-center w-3/4 mt-8">
        <div class="flex flex-col justify-center items-center">
            <h3 class="text-2xl ">Reseña</h3>
            <a href="{{route('publicacion.show',$res->id)}}" >
                <div class="">
                    <img class="w-[300px] h-[168.75px]" src="{{$res->media}}" alt="reseña mas reciente"/>
                    <h4 class="text-xl bg-white pl-1">{{$res->titulo}}</h4>
                </div>
            </a>
        </div>
        <div class="flex flex-col justify-center items-center">
            <h3 class="text-2xl">Entrevista</h3>
            <a href="{{route('publicacion.show',$ent->id)}}">
                <div class="">
                    <img class="w-[300px] h-[168.75px]" src="{{$ent->media}}" alt="reseña mas reciente"/>
                    <h4 class="text-xl bg-white pl-1">{{$ent->titulo}}</h4>
                </div>
            </a>
        </div>
    </div>
    <div class="flex flex-row justify-around items-center w-3/4 mt-16">
        <div class="flex flex-col justify-center items-center">
            <h3 class="text-2xl">Recomendacion</h3>
            <a href="{{route('publicacion.show',$rec->id)}}">
                <div class="">
                    <img class="w-[300px] h-[168.75px]" src="{{$rec->media}}" alt="reseña mas reciente"/>
                    <h4 class="text-xl bg-white pl-1">{{$rec->titulo}}</h4>
                </div>
            </a>
        </div>
        <div class="flex flex-col justify-center items-center">
            <h3 class="text-2xl">Evento</h3>
            <a href="{{route('publicacion.show',$eve->id)}}">
                <div class="">
                    <img class="w-[300px] h-[168.75px]" src="{{$eve->media}}" alt="reseña mas reciente">
                    <h4 class="text-xl bg-white pl-1">{{$eve->titulo}}</h4>
                </div>
            </a>
        </div>
    </div>
    </div>
@endsection
@section("titulo")
    Zaragoza Sonora
@endsection
