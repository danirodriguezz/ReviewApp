<div>
    <div class="relative">
      <svg class="w-6 h-6 text-gray-500 absolute left-3 top-1/2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
          <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/>
      </svg>
      <input  
              wire:model.debounce.300ms="search"
              wire:keyup="filterItems" 
              class="mt-6 bg-transparent border border-gray-500 p-4 pl-12 rounded-xl text-gray-300" 
              type="text"
              placeholder="Busca tu pelicula o serie favorita">
    </div>
    <div class="flex space-x-4 mt-20 backdrop-blur-xl  p-3 rounded-lg bg-blue-950/30 w-fit">
      <button 
        class="px-7 py-2 rounded {{ $filter == "all" ? 'bg-indigo-600 text-white font-semibold' : 'hover:bg-indigo-600 text-gray-400' }}"
        wire:click="setFilter('all')">
        Todas
      </button>
      <button 
        class="px-4 py-2 rounded  {{ $filter == "movies" ? 'bg-indigo-600 text-white font-semibold' : 'hover:bg-indigo-600 text-gray-400' }}"
        wire:click="setFilter('movies')">
        Películas
      </button>
      <button 
        class="px-4 py-2 rounded  {{ $filter == "series" ? 'bg-indigo-600 text-white font-semibold' : 'hover:bg-indigo-600 text-gray-400' }}"
        wire:click="setFilter('series')"
        > 
        Series
      </button>
    </div>

    
      @if ($items->isEmpty())
      <div class="mt-10">
          <p class="text-gray-300 mt-4 text-center">No se han encontrado resultados.</p>
      </div>
      @else
      <div class="mt-10">
        <h2 class="text-xl text-gray-400 font-bold">Todas<span class="text-sm"> ({{ $items->count() }})</span></h2>
        <div class="mt-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            {{-- Card de la pelicula --}}
            @foreach ($items as $item)    
            <div class="max-w-xs backdrop-blur-xl bg-blue-950/30 shadow-lg rounded-lg overflow-hidden">
                <!-- Imagen de la película -->
                <div class="relative">
                  <img loading="lazy" class="w-full h-70 object-cover" src="{{ config('constants.image_base_300_url') . $item->imagen_path }}" alt="Portada de la película">
                  <!-- Estrella con nota de review -->
                  <div class="absolute top-2 left-2 bg-black/60 backdrop-blur-2xl  text-yellow-400 font-normal px-3 py-1 rounded-full flex items-center space-x-1">
                    <svg class="w-6 h-6 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-width="1.5" d="M11.083 5.104c.35-.8 1.485-.8 1.834 0l1.752 4.022a1 1 0 0 0 .84.597l4.463.342c.9.069 1.255 1.2.556 1.771l-3.33 2.723a1 1 0 0 0-.337 1.016l1.03 4.119c.214.858-.71 1.552-1.474 1.106l-3.913-2.281a1 1 0 0 0-1.008 0L7.583 20.8c-.764.446-1.688-.248-1.474-1.106l1.03-4.119A1 1 0 0 0 6.8 14.56l-3.33-2.723c-.698-.571-.342-1.702.557-1.771l4.462-.342a1 1 0 0 0 .84-.597l1.753-4.022Z"/>
                    </svg>
                    <span class="mt-1">{{ round($item->puntuacion, 1) }}</span>
                  </div>
                </div>
                
                <!-- Título de la película -->
                <div class="p-4">
                  <a href="#" class="text-lg font-bold text-white cursor-pointer">{{ $item->titulo }}</a>
                </div>
            </div>
            @endforeach
            {{-- Fin de la card la pelicula --}}
        </div>
      </div>
      <div class="mt-6 mb-6">
        {{ $items->links() }}
      </div>
      @endif
</div>
