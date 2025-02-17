@extends('layout.app')

@section('title')
    Mis peliculas
@endsection

@section('content')
    <div>
        <div class=" p-3">
            <h1 class="text-5xl font-semibold text-white">Mis Peliculas</h1>
            @livewire('my-item-list')
        </div>
    </div>
@endsection