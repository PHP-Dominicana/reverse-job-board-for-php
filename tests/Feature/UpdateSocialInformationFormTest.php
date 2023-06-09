<?php

namespace Tests\Feature;

use App\Http\Livewire\UpdateSocialInformationForm;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class UpdateSocialInformationFormTest extends TestCase
{
    use RefreshDatabase;

    public function test_the_component_can_render(): void
    {

        $this->actingAs(User::factory()->create());

        $component = Livewire::test(UpdateSocialInformationForm::class);

        $component->assertStatus(200);
    }


    public function test_form_section_renders_correctly()
    {
        $this->actingAs($user = User::factory()->create());

        Livewire::test(UpdateSocialInformationForm::class)
            ->assertSee(__('Online presence'))
            ->assertSee(__('Where can people learn more about you and your work?'))
            ->assertSee(__('Website URL'))
            ->assertSee(__('LinkedIn URL'))
            ->assertSee(__('Twitter username'))
            ->assertSee(__('Github username'));
    }

    public function test_can_update_social_information()
    {
        $this->actingAs($user = User::factory()->create());

        $component = Livewire::test(UpdateSocialInformationForm::class)
            ->set('state.website', 'https://example.com')
            ->set('state.linkedin', 'https://linkedin.com/in/username')
            ->set('state.twitter', 'https://twitter.com/username')
            ->set('state.github', 'https://github.com/username')
            ->call('updateSocialInformationForm')
            ->assertEmitted('saved');

        $links = $user->links;

        $this->assertEquals($links->website, $component->state['website']);
        $this->assertEquals($links->linkedin, $component->state['linkedin']);
        $this->assertEquals($links->twitter, $component->state['twitter']);
        $this->assertEquals($links->github, $component->state['github']);
    }

    public function test_form_section_validates_valid_urls()
    {
        $this->actingAs($user = User::factory()->create());

        Livewire::test(UpdateSocialInformationForm::class)
            ->set('state', [
                'website' => 'invalid-url',
                'linkedin' => 'linkedin.com/in/username',
                'twitter' => 'twitter.com/username',
                'github' => 'github.com/username',
            ])
            ->call('updateSocialInformationForm')
            ->assertHasErrors([
                'website' => 'url',
                'linkedin' => 'url',
                'twitter' => 'url',
                'github' => 'url',
            ]);
    }
}
