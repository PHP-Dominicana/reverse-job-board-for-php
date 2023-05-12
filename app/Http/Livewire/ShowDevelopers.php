<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Contracts\View\View;

class ShowDevelopers extends Component
{
    use WithPagination;

    public string $location = '';
    public string $experienceLevel = '';

    /**
     * @var string[] $listeners
     */
    protected $listeners = ['filterDevelopers' => 'updateFilter'];

    /**
     * Update the page when the filter is applied.
     */
    public function updateFilter(string $location, string $experienceLevel): void
    {
        $this->location = $location;
        $this->experienceLevel = $experienceLevel;
    }

    public function render(): View
    {
        return view('livewire.show-developers',[
            'developers' => User::Where('location', 'like', '%' . $this->location . '%')
                                ->when($this->experienceLevel, function ($query) {
                                    return $query->where('experience_level', $this->experienceLevel);
                                })
                                ->paginate(10),
        ]);
    }
}
