@extends('layout.app')

@section('title')
    ReviewApp
@endsection

@section('content')
    <div>
        <div class=" p-3">
            <h1 class="text-5xl font-semibold text-white">ReviewApp</h1>
            <p class="text-white mt-4 max-w-xl">Descubre y comparte reviews de series y películas. Encuentra tu próxima gran historia con las recomendaciones de nuestra comunidad.</p>
        </div>
        @livewire('item-list')
    </div>
@endsection