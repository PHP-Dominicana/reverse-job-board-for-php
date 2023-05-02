<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use App\Actions\Profile\UpdateSocialInformation;


class UpdateSocialInformationForm extends Component
{
    /**
     * @var array{website: ?string, linkedin: ?string, github: ?string, twitter: ?string} $state
     */
    public array $state;

    public function mount(): void
    {
        $user = Auth::user();
        $links = json_decode($user->links);
        $this->state = [
            'website' => $links->website ?? null,
            'linkedin' => $links->linkedin ?? null,
            'github' => $links->github ?? null,
            'twitter' => $links->twitter ?? null,
        ];
    }

    public function updateSocialInformationForm(UpdateSocialInformation $updater): void
    {
        $this->resetErrorBag();
        $updater->update(
            Auth::user(),
            $this->state
        );

        $this->emit('saved');
    }

    public function render(): View|\Closure|string
    {
        return view('livewire.update-social-information-form');
    }
}
