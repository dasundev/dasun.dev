<?php

declare(strict_types=1);

use Livewire\Volt\Volt;

it('can render', function () {
    $component = Volt::test('welcome');

    $component->assertSee('Dasun Tharanga');
});
