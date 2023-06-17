<?php

namespace App\Http\Livewire;

use Illuminate\View\View;
use Livewire\Component;

class SearchJob extends Component
{
    public string $location = '';
    public string $experienceLevel = '';

    public function render(): View
    {
        return view('livewire.search-job');
    }

    public function applyFilter(): void
    {
        $this->emitTo('show-jobs','filterJobs',
            $this->location,
            $this->experienceLevel,
        );
    }
}
