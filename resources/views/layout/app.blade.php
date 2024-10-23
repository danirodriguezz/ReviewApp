<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>@yield('title', 'ReviewApp')</title>
    @livewireStyles
    @vite('resources/css/app.css')
</head>
<body >
    <header class="p-5">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ route('home.index') }}" class="text-2xl sm:text-3xl font-bold text-white">
                ReviewApp
            </a>
            <nav class="flex gap-10 items-center">
                <a class="text-sm font-semibold text-white hover:text-indigo-400 transition ease-in-out duration-300" href="">Iniciar Sesión</a>
                <a class="text-sm font-semibold text-white hover:text-indigo-400 transition ease-in-out duration-300" href="">Crear Cuenta</a>
                <a class="text-sm font-semibold text-white hover:text-indigo-400 transition ease-in-out duration-300" href="">Películas</a>
                <a class="text-sm font-semibold text-white hover:text-indigo-400 transition ease-in-out duration-300" href="">Series</a>
                <a class="text-sm font-semibold text-white hover:text-indigo-400 transition ease-in-out duration-300" href="">Libros</a>

            </nav>
        </div>
    </header>

    <!-- Contenido -->
    <main class="mt-16 container mx-auto">
        @yield('content', 'Text')
    </main>

    @livewireScripts
</body>
</html>