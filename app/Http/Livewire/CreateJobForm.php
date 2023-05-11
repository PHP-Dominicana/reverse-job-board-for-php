<?php

namespace App\Http\Livewire;

use App\Actions\Job\CreateJobAction;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateJobForm extends Component
{
    use WithFileUploads;

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
    private array $experienceLevels = [
        ['value' => 'Junior', 'label' => 'Junior'],
        ['value' => 'Mid', 'label' => 'Mid'],
        ['value' => 'Senior', 'label' => 'Senior'],
        ['value' => 'Lead', 'label' => 'Lead'],
    ];

    public User $user;

    /** @var array{ photo: ?UploadedFile, title: string, company_name: string, salary: number, experience_level: string, job_type: string, remote_policy: string, description: string, photo_url: ?string, photo_path: ?string }  */
    public array $state = [
        'title' => '',
        'company_name' => '',
        'location' => '',
        'remote_policy' => 'Remote',
        'job_type' => 'Full-time',
        'experience_level' => 'Junior',
        'salary' => 0.00,
        'description' => '',
        'photo_url' => '',
        'photo_path' => '',
    ];

    /**
     * @var mixed
     */
    public $photo;

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
            'experienceLevels' => $this->experienceLevels,
        ]);
    }

    public function createJob(CreateJobAction $jobAction): void
    {
        $this->resetErrorBag();
        $jobAction->create(
            $this->photo ?
                array_merge($this->state, ['photo' => $this->photo]) :
            $this->state
        );
        $this->emit('saved');
    }

    public function savedAction(): void
    {
        $this->state = [
            'title' => '',
            'company_name' => '',
            'location' => '',
            'remote_policy' => 'Remote',
            'job_type' => 'Full-time',
            'experience_level' => 'Junior',
            'salary' => 0.00,
            'description' => '',
            'photo_url' => '',
            'photo_path' => '',
        ];
    }

    private function defaultPhotoUrl(): string
    {
        return 'https://ui-avatars.com/api/?name=company_name&color=7F9CF5&background=EBF4FF';
    }
}
