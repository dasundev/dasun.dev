<?php

namespace Tests\Feature\Livewire;

use App\Livewire\Welcome;
use Livewire\Livewire;
use Tests\TestCase;

class WelcomeTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(Welcome::class)
            ->assertStatus(200)
            ->assertSeeHtml('<h1 class="text-5xl lg:text-6xl text-center mt-10 text-black dark:text-white">A Solid <span
                    class="text-primary-700">Laravel</span> Developer</h1>');
    }
}
