<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class CreateJobForm extends Component
{
    public User $user;

    public array $state = [
        'title' => '',
        'description' => '',
        'budget' => '',
        'category_id' => '',
        'photo_url' => '',
        'starts_at' => null,
        'ends_at' => null,
    ];
    protected $listeners = ['saved' => 'savedAction'];

    public function mount(User $user)
    {
        $this->user = $user;
        $this->state['starts_at'] = now()->format('Y-m-d\TH:i');
        $this->state['ends_at'] = now()->addDays(7)->format('Y-m-d\TH:i');
    }

    public function render()
    {
        return view('livewire.create-job-form');
    }

    public function savedAction()
    {
        $this->emit('saved');
    }
}
