<?php

namespace Tests\Feature\Livewire;

use App\Livewire\OpenSource;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Livewire\Livewire;
use Tests\TestCase;

class OpenSourceTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function renders_successfully()
    {
        Livewire::test(OpenSource::class)
            ->assertStatus(200)
            ->assertSee('Open Source');
    }
}
