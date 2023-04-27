<?php

namespace App\Http\Livewire;

use App\Actions\Developer\UpdatesUserDeveloperInformation;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

/**
 * @template TValue of array value
 */
class UpdateDeveloperInformation extends Component
{
    /**
     * @var array{title: ?string, description: ?string} $state
     */
    public array $state;

    /**
     * @var array<int|string, array<string, string>> $developStatuses
     */
    public array $developStatuses = [
        ['label' => 'Actively looking', 'value' => 'Actively looking'],
        ['label' => 'Open', 'value' => 'Open'],
        ['label' => 'Close', 'value' => 'Close'],
    ];

    /**
     * @var array<int|string, array<string, string>> $experienceLevels
     */
    public array $experienceLevels = [
        ['label' => 'Junior', 'value' => 'Junior'],
        ['label' => 'Mid', 'value' => 'Mid'],
        ['label' => 'Senior', 'value' => 'Senior'],
        ['label' => 'Lead', 'value' => 'Lead'],
    ];

    public function mount(): void
    {
        $user = Auth::user();
        $this->state = [
            'title' => $user->title ?? null,
            'description' => $user->description ?? null,
            'status' => $user->status ?? 'Close',
            'experience_level' => $user->experience_level ?? 'Junior',
            'location' => $user->location ?? null,
            'phone_number' => $user->phone_number ?? null,
        ];
    }

    public function updateDeveloperInformation(UpdatesUserDeveloperInformation $updater): void
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
        return view('livewire.update-developer-information');
    }
}
