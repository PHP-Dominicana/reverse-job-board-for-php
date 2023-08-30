<?php

namespace App\Http\Livewire;

use App\Models\Job;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class ShowJobs extends Component
{
    use WithPagination;

    public string $location = '';
    public string $experienceLevel = '';

    /**
     * @var string[] $listeners
     */
    protected $listeners = ['filterJobs' => 'updateFilter'];

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
        return view('livewire.show-jobs',[
            'jobs' => Job::Where('location', 'like', '%' . $this->location . '%')
                                ->when($this->experienceLevel, function ($query) {
                                    return $query->where('experience_level', $this->experienceLevel);
                                })
                                ->paginate(10),
        ]);
    }
}
