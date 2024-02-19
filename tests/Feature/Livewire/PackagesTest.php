<?php

namespace Tests\Feature\Livewire;

use App\Livewire\Packages;
use App\Models\Package;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Livewire\Livewire;
use Tests\TestCase;

class PackagesTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function renders_successfully()
    {
        Livewire::test(Packages::class)
            ->assertStatus(200);
    }

    /** @test */
    public function does_not_display_draft_packages()
    {
        Package::factory()->draft()->create();

        Livewire::test(Packages::class)
            ->assertViewHas('packages', function ($packages) {
                return $packages->count() === 0;
            });
    }
}
