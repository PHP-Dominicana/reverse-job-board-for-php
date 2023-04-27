<?php

namespace Tests\Feature;

use App\Http\Livewire\UpdateDeveloperInformation;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Jetstream\Http\Livewire\UpdateProfileInformationForm;
use Livewire\Livewire;
use Tests\TestCase;

class DeveloperInformationTest extends TestCase
{
    use RefreshDatabase;

    public function test_current_developer_information_is_available(): void
    {
        $this->actingAs($user = User::factory()->create());

        $component = Livewire::test(UpdateDeveloperInformation::class);

        $this->assertEquals($user->title, $component->state['title']);
        $this->assertEquals($user->description, $component->state['description']);
        $this->assertEquals($user->status, $component->state['status']);
        $this->assertEquals($user->experience_level, $component->state['experience_level']);
        $this->assertEquals($user->location, $component->state['location']);
        $this->assertEquals($user->phone_number, $component->state['phone_number']);
    }

    public function test_developer_information_can_be_updated(): void
    {
        $this->actingAs($user = User::factory()->create());

        Livewire::test(UpdateDeveloperInformation::class)
                ->set('state', [
                    'title' => 'Test Title',
                    'description' => 'I\'m a full stack developer who',
                    'status' => 'Open',
                    'experience_level' => 'Senior',
                    'location' => 'Jakarta',
                    'phone_number' => '081234567890',
                ])
                ->call('updateDeveloperInformation');

        $this->assertEquals('Test Title', $user->fresh()->title);
        $this->assertEquals('I\'m a full stack developer who', $user->fresh()->description);
        $this->assertEquals('Open', $user->fresh()->status);
        $this->assertEquals('Senior', $user->fresh()->experience_level);
        $this->assertEquals('Jakarta', $user->fresh()->location);
        $this->assertEquals('081234567890', $user->fresh()->phone_number);
    }
}
