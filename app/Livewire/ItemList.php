<?php

namespace App\Livewire;

use App\Models\Movie;
use App\Models\Serie;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Component;
use Livewire\WithPagination;

class ItemList extends Component
{
    use WithPagination;

    public $filter = "all";
    public $search = '';

    public function filterItems()
    {
        // Reinicia la paginación si cambias los resultados.
        $this->resetPage();
    }

    public function setFilter($filter)
    {
        $this->filter = $filter;
        $this->resetPage();
    }

    public function render()
    {
        // Obtener los datos segun el filtro
        switch ($this->filter) {
            case 'movies':
                $items = Movie::when($this->search, function($query) {
                    $query->where('titulo', 'like', '%' . $this->search . '%');
                })->paginate(12);
                break;
            case 'series':
                $items = Serie::when($this->search, function($query) {
                    $query->where('titulo', 'like', '%' . $this->search . '%');
                })->paginate(12);
                break;
            default:
                // Mostrar todos los elementos
                $movies = Movie::when($this->search, function($query) {
                    $query->where('titulo', 'like', '%' . $this->search . '%');
                })->get();
                $series = Serie::when($this->search, function($query) {
                    $query->where('titulo', 'like', '%' . $this->search . '%');
                })->get();
                $allItems = $movies->merge($series)->sortBy('titulo');
                $items = $this->paginateCollection($allItems, 12);
        }

        return view('livewire.item-list', [
            'items' => $items,
        ]);
    }
    /**
     * Paginar manualmente una colección.
     */
    private function paginateCollection($items, $perPage)
    {
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $itemsForCurrentPage = $items->forPage($currentPage, $perPage);

        return new LengthAwarePaginator(
            $itemsForCurrentPage->values(),
            $items->count(),
            $perPage,
            $currentPage,
            ['path' => request()->url(), 'query' => request()->query()]
        );
    }
}
