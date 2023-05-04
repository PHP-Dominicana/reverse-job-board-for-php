<?php

namespace Tests\Feature\Developers;

use App\Http\Livewire\DeveloperHire;
use App\Http\Livewire\UpdateDeveloperInformation;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class HireTest extends TestCase
{
    use RefreshDatabase;

    public function test_the_hire_page_returns_a_successful_response(): void
    {
        $this->actingAs($user = User::factory()->create());

        Livewire::test(DeveloperHire::class, ['developer' => $user])
                ->assertSeeText('Contact the developer')
                ->assertSet('developer.name', $user->name)
                ->assertSet('developer.email', $user->email);
    }
}
