<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomeTest extends TestCase
{
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
}
