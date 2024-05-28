@extends('layouts.sesion')

@section('h1')
    Crear Cuenta
@endsection

@section('titulo')
    Crear Cuenta
@endsection

@section('contenido')
    <div class="flex flex-col justify-center items-center pb-4">
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nombre')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Info -->
        <div>
            <br>
            <x-input-label for="info" :value="__('Información sobre ti')" />
            <textarea id="info" class="block mt-1 w-full" name="info" maxlength="350" required autofocus autocomplete="info"></textarea>
            <x-input-error :messages="$errors->get('info')" class="mt-2" />
        </div>

        <!-- Profile Picture -->
        <div>
            <br>
            <x-input-label for="pfp" :value="__('Foto de Perfil (png)')" />
            <input type="file" class="block mt-1 w-full" name="pfp" accept=".png"/>
            <x-input-error :messages="$errors->get('pfp')" class="mt-2" />
        </div>

        <!-- Admin -->
        <input type="number" value="0" name="admin" hidden>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Contraseña')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between mt-4">
            <a href="/" class="btn  btn-sm glass bg-gray-300 hover:bg-gray-400 text-black">Cancelar</a>
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('¿Ya registrado?') }}
            </a>

            <input type="submit" class="btn  btn-sm glass bg-gray-300 hover:bg-gray-400 text-black" value="Crear Cuenta">
        </div>
    </form>
    </div>
@endsection
