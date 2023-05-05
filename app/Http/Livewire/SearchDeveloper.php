<?php

namespace App\Http\Livewire;

use Illuminate\View\View;
use Livewire\Component;

class SearchDeveloper extends Component
{
    public string $location = '';
    public string $experienceLevel = '';

    public function render(): View
    {
        return view('livewire.search-developer');
    }

    public function applyFilter(): void
    {
        $this->emitTo('show-developers','filterDevelopers',
            $this->location,
            $this->experienceLevel,
        );
    }
}
