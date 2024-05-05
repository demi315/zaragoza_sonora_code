@extends("layouts.layout")

@section("contenido")
    <div>
        <div>
            <h3>Reseña</h3>
            <a href="{{route('publicacion.show',$res->id)}}">
                <div class="bg-black">
                    <img src="{{$res->pfp}}" alt="reseña mas reciente"/>
                    <h4>{{$res->titulo}}</h4>
                </div>
            </a>
        </div>
        <div>
            <h3>Entrevista</h3>
            <a href="{{route('publicacion.show',$ent->id)}}">
                <div class="bg-black">
                    <img src="{{$ent->pfp}}" alt="reseña mas reciente"/>
                    <h4>{{$ent->titulo}}</h4>
                </div>
            </a>
        </div>
    </div>
    <div>
        <div>
            <h3>Recomendacion</h3>
            <a href="{{route('publicacion.show',$rec->id)}}">
                <div class="bg-black">
                    <img src="{{$rec->pfp}}" alt="reseña mas reciente"/>
                    <h4 class="bg-black">{{$rec->titulo}}</h4>
                </div>
            </a>
        </div>
        <div>
            <h3>Evento</h3>
            <a href="{{route('publicacion.show',$eve->id)}}">
                <div class="bg-black">
                    <img src="{{$eve->pfp}}" alt="reseña mas reciente">
                    <h4 class="bg-black">{{$eve->titulo}}</h4>
                </div>
            </a>
        </div>
    </div>
@endsection
@section("titulo")
    Zaragoza Sonora
@endsection
