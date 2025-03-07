@extends('layout.app')

@section('title')
    Login
@endsection

@section('content')
<div class="md:flex md:justify-center md:gap-10 md:items-center p-4">
    {{-- Imagen del login --}}
    <div class="md:w-1/2 xl:w-6/12 xl:p-5 mb-2">
        <img src="{{ asset('img/login.png') }}" alt="Imagen del login">
    </div>

    <div class="md:w-1/2 xl:w-1/3 p-6  rounded-lg shadow-xl">
        <form action="{{ route('login.store') }}" method="POST">
            @csrf
            {{-- Mensaje de error de credenciales --}}
            @if (session('mensaje'))
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ session('mensaje') }}</p>
            @endif
            {{-- Email del usuario --}}
            <div class="mb-5">
                <label for="email" class="mb-2 block uppercase text-gray-300 font-bold">Email</label>
                <input id="email" name="email" type="email" placeholder="Tu email de registro"
                    class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror"
                    value="{{ old('email') }}">
            </div>
            @error('email')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
            @enderror
            {{-- Password del usuario --}}
            <div class="mb-5">
                <label for="password" class="mb-2 block uppercase text-gray-300 font-bold">Password</label>
                <input id="password" name="password" type="password" placeholder="Tu password de registro"
                    class="border p-3 w-full rounded-lg @error('password') border-red-500 @enderror">
            </div>
            @error('password')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
            @enderror
            {{-- Checbox para la sesion abierta --}}
            <div class="mb-5">
                <input type="checkbox" name="remember" id="remember">
                <label for="remember" class="text-gray-300 text-sm">Mantener mi sesión abierta</label>
            </div>
            {{-- Boton para crear cuenta --}}
            <input type="submit" value="Inicia Sesión"
                class=" bg-indigo-600 hover:bg-indigo-700 tramsition-color cursor-pointer uppercase
            font-bold w-full rounded-lg p-3 text-white">
        </form>
    </div>
</div>
@endsection