<?php

arch('verify that dd() and dump() are not being utilized in the application')
    ->expect(['dd', 'dump'])
    ->not->toBeUsed();

arch('ensure that all files within a given namespace are classes')
    ->expect('App\Models')
    ->toBeClasses();

arch('livewire components only used repositories')
    ->expect('App\Models')
    ->not->toBeUsedIn('App\Http\Livewire');
