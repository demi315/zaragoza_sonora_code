<header class="flex flex-row justify-around items-center h-15v ">
    <a href="/"><img height="150px" width="150px" class="p-4 h-full" src="{{asset("images/ZS_Logo_Negro.png")}}" alt="logo Zaragoza Sonora"/></a>
    <h1 class="text-4xl">@yield('nombre_usuario')</h1>
    <div>
        <div class="flex flex-row justify-center items-center">
            <a href="{{route('usuario.index')}}" class="flex flex-col justify-center items-center">
                <img height="75px" width="75px" style="border-radius: 50%" alt="user profile picture" src="{{auth()->user()->pfp}}">
                <h3 class="text-m"> {{auth()->user()->name}}</h3>
            </a>
            <form action="{{route("logout")}}" method="post">
                @csrf
                <button class="btn glass bg-gray-300 hover:bg-gray-400 text-black" type="submit">Cerrar Sesión</button>
            </form>
        </div>
    </div>
</header>

