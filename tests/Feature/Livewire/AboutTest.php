<?php

declare(strict_types=1);

namespace Tests\Feature\Livewire;

use App\Livewire\About;
use Livewire\Livewire;
use Tests\TestCase;

final class AboutTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(About::class)
            ->assertStatus(200)
            ->assertSee('About');
    }
}
