@extends('layouts.sesion')

@section('h1')
    Zaragoza Sonora
@endsection

@section('titulo')
    Inicio de Sesión
@endsection


@section('contenido')
    <div class="flex flex-col justify-center items-center mt-12">
    <h2 class="text-2xl mb-6">Inicio de sesión</h2>
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Contraseña')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-center mt-4">
            <input type="submit" value="Iniciar Sesión" class="btn  btn-sm glass bg-gray-300 hover:bg-gray-400 text-black">
        </div>
    </form>
    </div>
@endsection
