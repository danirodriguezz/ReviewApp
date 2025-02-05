@extends('layout.app')

@section('title')
    {{$movie->titulo}}
@endsection

@section('content')
    <div>
        <!-- Banner -->
        <div class="relative w-full h-[400px] bg-cover bg-center rounded-3xl" 
             style="background-image: url('{{ config('constants.image_banner_original') . $movie->banner_path }}');">
            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent rounded-3xl"></div>
            <div class="absolute -bottom-10 left-14 bg-gray-800/80 rounded-xl px-8 py-12">
                <h1 class="text-3xl font-semibold text-white">{{$movie->titulo}}</h1>
            </div>
        </div>
        <!-- Contenedor principal -->
        <div class="container mx-auto px-6 mt-16 grid grid-cols-1 md:grid-cols-3 gap-8 py-10">
            <!-- Póster -->
            <div class="md:col-span-1">
                <img src="{{ config('constants.image_base_500_url') . $movie->imagen_path }}" alt="{{$movie->titulo}} Poster" 
                     class="rounded-lg shadow-lg">
            </div>

            <!-- Detalles de la película -->
            <div class="md:col-span-2 space-y-4">
                <!-- Descripción -->
                <h2 class="text-2xl font-semibold text-white">Descripción</h2>
                <p class="text-gray-300 leading-relaxed">{{$movie->descripción}}</p>
                
                <!-- Estrella con nota de review -->
                <div class="w-20 bg-black/40 backdrop-blur-2xl  text-yellow-400 font-normal px-3 py-1 rounded-full flex items-center space-x-1">
                    <svg class="w-6 h-6 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-width="1.5" d="M11.083 5.104c.35-.8 1.485-.8 1.834 0l1.752 4.022a1 1 0 0 0 .84.597l4.463.342c.9.069 1.255 1.2.556 1.771l-3.33 2.723a1 1 0 0 0-.337 1.016l1.03 4.119c.214.858-.71 1.552-1.474 1.106l-3.913-2.281a1 1 0 0 0-1.008 0L7.583 20.8c-.764.446-1.688-.248-1.474-1.106l1.03-4.119A1 1 0 0 0 6.8 14.56l-3.33-2.723c-.698-.571-.342-1.702.557-1.771l4.462-.342a1 1 0 0 0 .84-.597l1.753-4.022Z"/>
                    </svg>
                    <span class="mt-1">{{ round($movie->puntuacion, 1) }}</span>
                </div>

                <!-- Tipo -->
                <div>
                    <h3 class="mt-7 text-sm font-bold uppercase text-gray-400">Tipo</h3>
                    <p class="text-gray-200 mt-2">
                        {{ $movie->tipo === 'pelicula' ? 'Movie' : ($movie->tipo === 'serie' ? 'Series' : 'Unknown') }}
                    </p>
                </div>
                
                <!-- Fecha de lanzamiento -->
                <div>
                    <h3 class="mt-7 text-sm font-bold uppercase text-gray-400">Fecha de lanzamiento</h3>
                    <p class="text-gray-200 mt-2">{{ \Carbon\Carbon::parse($movie->fecha_lanzamiento)->format('d-m-Y') }}</p>
                </div>

                <!-- Géneros -->
                <div class="col-span-2 md:col-span-3">
                    <h3 class="mt-7 text-sm font-bold uppercase text-gray-400">Géneros</h3>
                    <p class="text-gray-200 mt-2">
                        {{ $genres->pluck('name')->implode(', ') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection