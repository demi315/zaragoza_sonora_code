@extends('layouts.usuario')

@section('nombre_usuario')
    Editar Perfil
@endsection

@section('contenido')
    <form method="POST" action="{{route('profile.update')}}">
        @csrf
        @method('PATCH')

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nombre')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{$usuario->name}}" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{$usuario->email}}" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Info -->
        <div>
            <br>
            <x-input-label for="info" :value="__('Información sobre ti')" />
            <textarea id="info" class="block mt-1 w-full" name="info" required autofocus autocomplete="info">{{$usuario->info}}</textarea>
            <x-input-error :messages="$errors->get('info')" class="mt-2" />
        </div>

        <!-- Profile Picture -->
        <div>
            <br>
            <x-input-label for="pfp" :value="__('Foto de Perfil (png)')" />
            <input type="file" class="block mt-1 w-full" name="pfp" accept=".png" autofocus/>
            <x-input-error :messages="$errors->get('pfp')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Cambiar Contraseña')" />

            <x-text-input id="password" class="block mt-1 w-full"
                          type="password"
                          name="password"
            />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirmar Cambio de Contraseña')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                          type="password"
                          name="password_confirmation" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="btn" href="{{route('usuario.index')}}">Cancelar</a>
            <x-primary-button class="ms-4">
                {{ __('Guardar') }}
            </x-primary-button>
        </div>
    </form>
    @if($usuario->admin != 1)
        <form action="{{route("profile.destroy", $usuario->id)}}" method="POST">
            @csrf
            @method("DELETE")
            <x-primary-button>Eliminar Cuenta</x-primary-button>
        </form>
    @endif
@endsection
