<?php

namespace App\Http\Livewire;

use App\Models\User;
use DateTimeInterface;
use Illuminate\View\View;
use Livewire\Component;

class CreateJobForm extends Component
{
    public User $user;

    /** @var array{title: string, description: string, budget: string, category_id: string, photo_url: string, starts_at: ?DateTimeInterface, ends_at: ?DateTimeInterface}  */
    public array $state = [
        'title' => '',
        'description' => '',
        'budget' => '',
        'category_id' => '',
        'photo_url' => '',
        'starts_at' => null,
        'ends_at' => null,
    ];

    /** @var array<string, string> */
    protected $listeners = ['saved' => 'savedAction'];

    public function mount(User $user): void
    {
        $this->user = $user;
        $this->state['starts_at'] = now();
        $this->state['ends_at'] = now();
    }

    public function render(): View
    {
        return view('livewire.create-job-form');
    }

    public function savedAction(): void
    {
        $this->emit('saved');
    }
}
