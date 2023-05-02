<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Livewire\Livewire;
use App\Http\Livewire\FormSection;
use Illuminate\Foundation\Testing\WithFaker;
use App\Http\Livewire\UpdateSocialInformationForm;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UpdateSocialInformationFormTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function the_component_can_render(): void
    {

        $this->actingAs(User::factory()->create());

        $component = Livewire::test(UpdateSocialInformationForm::class);

        $component->assertStatus(200);
    }


    public function test_form_section_renders_correctly()
    {
        Livewire::test(FormSection::class)
            ->assertSee(__('Online presence'))
            ->assertSee(__('Where can people learn more about you and your work?'))
            ->assertSee(__('Website URL'))
            ->assertSee(__('LinkedIn URL'))
            ->assertSee(__('Twitter username'))
            ->assertSee(__('Github username'));
    }

    public function test_can_update_social_information()
    {
        Livewire::test(FormSection::class)
            ->set('state.website', 'https://example.com')
            ->set('state.linkedin', 'https://linkedin.com/in/username')
            ->set('state.twitter', 'https://twitter.com/username')
            ->set('state.github', 'https://github.com/username')
            ->call('updateSocialInformationForm')
            ->assertEmitted('saved');
    }

    public function test_form_section_validates_valid_urls()
    {
        Livewire::test(FormSection::class)
            ->set('state', [
                'website' => 'invalid-url',
                'linkedin' => 'linkedin.com/in/username',
                'twitter' => 'twitter.com/username',
                'github' => 'github.com/username',
            ])
            ->call('updateSocialInformationForm')
            ->assertHasErrors([
                'state.website' => 'url',
                'state.linkedin' => 'url',
                'state.twitter' => 'url',
                'state.github' => 'url',
            ]);
    }
}
