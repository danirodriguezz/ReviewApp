@extends('layout.app')

@section('title')
    Registro de usuario
@endsection

@section('content')
<div class="md:flex md:justify-center md:gap-10 md:items-center p-4">
    {{-- Imagen del registro de usuairos --}}
    <div class="md:w-1/2 xl:w-6/12 xl:p-5 mb-2">
        <img src="{{ asset('img/register.png') }}" alt="Imagen del login">
    </div>

    <div class="md:w-1/2 xl:w-1/3 p-6 rounded-lg shadow-xl">
        <form action="{{ route('register.store') }}" method="POST">
            @csrf
            {{-- Nombre --}}
            <div class="mb-5">
                <label for="name" class="mb-2 block uppercase text-gray-300 font-bold">Nombre</label>
                <input id="name" name="name" type="text" placeholder="Tu nombre"
                    class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"
                    value="{{ old('name') }}">
                @error('name')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                @enderror
            </div>
            {{-- Apellidos --}}
            <div class="mb-5">
                <label for="surname" class="mb-2 block uppercase text-gray-300 font-bold">Apellidos</label>
                <input id="surname" name="surname" type="text" placeholder="Tus apellidos"
                    class="border p-3 w-full rounded-lg @error('surname') border-red-500 @enderror"
                    value="{{ old('surname') }}">   
                @error('surname')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                @enderror
            </div>
            {{-- Nombre de usuario --}}
            <div class="mb-5">
                <label for="username" class="mb-2 block uppercase text-gray-300 font-bold">Username</label>
                <input id="username" name="username" type="text" placeholder="Tu nombre de usuario"
                    class="border p-3 w-full rounded-lg @error('username') border-red-500 @enderror"
                    value="{{ old('username') }}">
                @error('username')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                @enderror    
            </div>
            {{-- Email del usuario --}}
            <div class="mb-5">
                <label for="email" class="mb-2 block uppercase text-gray-300 font-bold">Email</label>
                <input id="email" name="email" type="email" placeholder="Tu email de registro"
                    class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror"
                    value="{{ old('email') }}">
                @error('email')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                @enderror
            </div>
            {{-- Password del usuario --}}
            <div class="mb-5">
                <label for="password" class="mb-2 block uppercase text-gray-300 font-bold">Password</label>
                <input id="password" name="password" type="password" placeholder="Tu password de registro"
                    class="border p-3 w-full rounded-lg @error('password') border-red-500 @enderror">
                @error('password')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                @enderror
            </div>
            {{-- Repetir password --}}
            <div class="mb-5">
                <label for="password_confirmation" class="mb-2 block uppercase text-gray-300 font-bold">Repite tu
                    password</label>
                <input id="password_confirmation" name="password_confirmation" type="password"
                    placeholder="Repite tu password" class="border p-3 w-full rounded-lg">
            </div>
            {{-- Boton para crear cuenta --}}
            <input type="submit" value="Crear Cuenta"
                class="bg-indigo-600 hover:bg-indigo-700 tramsition-color cursor-pointer uppercase
            font-bold w-full rounded-lg p-3 text-white">
        </form>
    </div>
</div>
@endsection