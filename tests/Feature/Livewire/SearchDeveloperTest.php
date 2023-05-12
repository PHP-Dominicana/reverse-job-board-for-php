<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\SearchDeveloper;
use Livewire\Livewire;
use Tests\TestCase;

class SearchDeveloperTest extends TestCase
{
    /** @test */
    public function test_the_component_can_render()
    {
        $component = Livewire::test(SearchDeveloper::class);

        $component->assertStatus(200);
    }
}
