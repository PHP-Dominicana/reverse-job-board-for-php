<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\CreateJobForm;
use Livewire\Livewire;
use Tests\TestCase;

class CreateJobFormTest extends TestCase
{
    /** @test */
    public function test_the_component_can_render()
    {
        $component = Livewire::test(CreateJobForm::class);
        $component->assertStatus(200);
    }

}
