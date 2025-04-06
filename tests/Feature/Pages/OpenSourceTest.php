<?php

declare(strict_types=1);

use App\Models\Package;
use Livewire\Volt\Volt;

it('can render', function () {
    $component = Volt::test('open-source');

    $component->assertSee('Things I built for the community.');
});

it('can list packages', function () {
    $packages = Package::factory()->count(3)->create();

    $component = Volt::test('open-source');

    $component->assertSee($packages->find(1)->identifier);
    $component->assertSee($packages->find(2)->identifier);
    $component->assertSee($packages->find(3)->identifier);
});
