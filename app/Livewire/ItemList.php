<?php

namespace App\Livewire;

use App\Models\Movie;
use Livewire\Component;

class ItemList extends Component
{
    public function render()
    {
        return view('livewire.item-list', [
            'movies' => Movie::paginate(12),
        ]);
    }
}
