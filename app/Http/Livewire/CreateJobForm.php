<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\View\View;
use Livewire\Component;

class CreateJobForm extends Component
{
    /** @var array<int, array<string, string>> */
    private array $remotePolicies = [
        ['value' => 'Remote', 'label' => 'Remote'],
        ['value' => 'Onsite', 'label' => 'Onsite'],
        ['value' => 'Hybrid', 'label' => 'Hybrid'],
    ];

    /** @var array<int, array<string, string>> */
    private array $jobTypes = [
        ['value' => 'Full-time', 'label' => 'Full-time'],
        ['value' => 'Part-time', 'label' => 'Part-time'],
        ['value' => 'Contract', 'label' => 'Contract'],
        ['value' => 'Freelance', 'label' => 'Freelance'],
        ['value' => 'Internship', 'label' => 'Internship'],
    ];

    /** @var array<int, array<string, string>> */
    private array $jobLevels = [
        ['value' => 'Junior', 'label' => 'Junior'],
        ['value' => 'Mid', 'label' => 'Mid'],
        ['value' => 'Senior', 'label' => 'Senior'],
        ['value' => 'Lead', 'label' => 'Lead'],
    ];

    public User $user;

    /** @var array{title: string, company_name: string, salary: number, experience_level: string, job_type: string, job_level: string, remote_policy: string, description: string, photo_url: string, photo_path: string }  */
    public array $state = [
        'title' => '',
        'company_name' => '',
        'remote_policy' => 'Remote',
        'job_type' => '',
        'experience_level' => '',
        'salary' => 0,
        'description' => '',
        'job_level' => '',
        'photo_url' => '',
        'photo_path' => '',
    ];

    /** @var array<string, string> */
    protected $listeners = ['saved' => 'savedAction'];

    public function mount(User $user): void
    {
        $this->user = $user;
        $this->state['photo_url'] = $this->defaultPhotoUrl();
    }

    public function render(): View
    {
        return view('livewire.create-job-form', [
            'remotePolicies' => $this->remotePolicies,
            'jobTypes' => $this->jobTypes,
            'jobLevels' => $this->jobLevels,
        ]);
    }

    public function createJob(): void
    {

    }

    public function savedAction(): void
    {
        $this->emit('saved');
    }

    private function defaultPhotoUrl(): string
    {
        return 'https://ui-avatars.com/api/?name=company_name&color=7F9CF5&background=EBF4FF';
    }
}
