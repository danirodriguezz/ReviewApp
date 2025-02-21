<?php

namespace App\Livewire;

use App\Models\ListaSeguimiento;
use App\Models\Movie;
use App\Models\Serie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Livewire\Component;
use Livewire\WithPagination;

class MyItemList extends Component
{
    use WithPagination;

    public $filter = "viendo";
    public $tipo_contenido;


    public function mount()
    {
        $this->tipo_contenido = request()->is('mymovies') ? 'pelicula' : 'serie';
    }

    public function setFilter($filter)
    {
        $this->filter = $filter;
        $this->resetPage();
        $this->render(); // Forzar actualización de datos
    }

    public function render()
    {
        // Obtener los elementos de la lista según el filtro actual
        $itemsQuery = ListaSeguimiento::where('user_id', Auth::id())
            ->where('tipo_contenido', $this->tipo_contenido);
    
        $items = $itemsQuery->where('estado', $this->filter)->get();
    
        // Extraer IDs de contenido
        $contenidos_id = $items->pluck('contenido_id')->toArray();
    
        // Obtener películas o series según el tipo de contenido
        if ($this->tipo_contenido === 'pelicula') {
            $items = Movie::whereIn('id', $contenidos_id)->get();
        } else {
            $items = Serie::whereIn('id', $contenidos_id)->get();
        }
    
        // Contar el número de elementos por cada estado
        $viendoCount = $itemsQuery->clone()->where('estado', 'viendo')->count();
        $pendienteCount = $itemsQuery->clone()->where('estado', 'pendiente')->count();
    
        return view('livewire.my-item-list', [
            'items' => $items,
            'viendoCount' => $viendoCount,
            'pendienteCount' => $pendienteCount
        ]);
    }
    
}
