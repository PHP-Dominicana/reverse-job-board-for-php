<?php

namespace Tests\Feature;

use App\Http\Livewire\UpdateDeveloperInformation;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class HomeTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_the_application_returns_a_successful_response_for_about(): void
    {
        $response = $this->get('/about');

        $response->assertStatus(200);
    }

    public function test_the_application_can_see_welcom_text(): void
    {
        $response = $this->get('/');

        $response->assertSeeText('The reverse job board for PHP developers');
        $response->assertSeeText('Get started');
        $response->assertSeeText('Learn more');
    }

    public function test_the_application_returns_a_successful_response_for_login(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_the_application_returns_a_successful_response_for_register(): void
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function test_should_see_developers_available(): void
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
        $response = $this->get('/');

        $response->assertSeeText('Developers available now');
        $response->assertSeeText($user->fresh()->short_description);
    }
}
