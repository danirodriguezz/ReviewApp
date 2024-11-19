@extends('layout.app')

@section('title')
    ReviewApp
@endsection

@section('content')
    <div>
        <h1 class="text-5xl font-semibold text-white">ReviewApp</h1>
        <p class="text-white mt-4 max-w-xl">Descubre y comparte reviews de libros, series y películas. Encuentra tu próxima gran historia con las recomendaciones de nuestra comunidad.</p>
        @livewire('search-item')
    </div>
@endsection