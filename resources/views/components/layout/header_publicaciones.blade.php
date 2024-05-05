<header class="hidden bg-header text-white
	    sm:flex flex-row justify-around items-center h-15v">
    <a href="/"><img height="150px" width="150px" class="p-4 h-full" src="{{asset("images/ZS_Logo_Negro.png")}}" alt="logo Zaragoza Sonora"/></a>
    <h1 class="text-4xl">@yield('h1')</h1>
    <div>
        @guest
            <a href="{{route("login")}}" class="btn glass text-white">Acceder</a>
            <a href="{{route("register")}}" class="btn glass text-white">Registrarme</a>
        @endguest
        @auth
            <div class="flex flex-row">
                <a href="{{route('usuario.index')}}"><h3 class="text-xl m-5"> {{auth()->user()->name}}</h3></a>
                <form action="{{route("logout")}}" method="post">
                    @csrf
                    <button class="btn glass text-white" type="submit">Cerrar Sesión</button>
                </form>
            </div>
        @endauth

    </div>
</header>