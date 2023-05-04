<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class DeveloperHire extends Component
{
    public User $developer;

    public function mount(User $developer): void
    {
        $this->developer = $developer;
    }

    public function render()
    {
        return view('livewire.developer-hire');
    }
}
