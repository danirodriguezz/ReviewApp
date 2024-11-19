<?php

namespace App\Livewire;

use Livewire\Component;

class SearchItem extends Component
{
    public $movies;
    public function render()
    {
        return view('livewire.search-item');
    }
}
