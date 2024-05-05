<header class="hidden bg-header text-white
	    sm:flex flex-row justify-around items-center h-15v ">
    <a href="/"><img height="150px" width="150px" class="p-4 h-full" src="{{asset("images/ZS_Logo_Negro.png")}}" alt="logo Zaragoza Sonora"/></a>
    <h1 class="text-4xl">@yield('nombre_usuario')</h1>
    <div>
        <div class="flex flex-row">
            imagen perfil
            <form action="{{route("logout")}}" method="post">
                @csrf
                <button class="btn glass text-white" type="submit">Cerrar Sesión</button>
            </form>
        </div>
    </div>
</header>

