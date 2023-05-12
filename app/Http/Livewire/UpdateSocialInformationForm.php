<?php

namespace App\Http\Livewire;

use App\Actions\Profile\UpdateSocialInformation;
use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;


class UpdateSocialInformationForm extends Component
{
    /**
     * @var array{website: ?string, linkedin: ?string, github: ?string, twitter: ?string} $state
     */
    public array $state;

    public function mount(): void
    {
        $user = Auth::user();
        $links = $user->links ?? null;
        $this->state = [
            'website' => $links?->website ?? null,
            'linkedin' => $links?->linkedin ?? null,
            'github' => $links?->github ?? null,
            'twitter' => $links?->twitter ?? null,
        ];
    }

    /**
     * @throws AuthenticationException
     */
    public function updateSocialInformationForm(UpdateSocialInformation $updater): void
    {
        $this->resetErrorBag();
        $updater->update(
            Auth::user(),
            $this->state
        );

        $this->emit('saved');
    }

    public function render(): View|Closure|string
    {
        return view('livewire.update-social-information-form');
    }
}
