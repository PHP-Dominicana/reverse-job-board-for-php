<?php

namespace Tests\Feature\Developers;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DetailsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test if developer detail page return 200 status.
     */
    public function test_the_developer_detail_returns_a_successful_response(): void
    {
        $user = User::factory()->create();
        $response = $this->get('/developers/' . $user->id);

        $response->assertStatus(200);
        $response->assertSeeText('This information is only visible with register user.');
        $response->assertSeeText('Register');
        $response->assertSeeText($user->title);
        $response->assertSeeText($user->description);
    }

    /**
     * Test if developer detail page return 200 status whn user is auth.
     */
    public function test_the_developer_detail_returns_a_successful_response_when_user_is_auth(): void
    {
        $this->actingAs($user = User::factory()->create());
        $response = $this->get('/developers/' . $user->id);

        $response->assertStatus(200);
        $response->assertSeeText($user->name);
        $response->assertSeeText($user->email);
    }
}
