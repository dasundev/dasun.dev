<?php

declare(strict_types=1);

use App\Services\Packagist;

it('can get a valid package', function () {
    $data = Packagist::getPackageWithStats('laravel-payhere/laravel-payhere');

    expect($data)
        ->toBeArray()
        ->toMatchArray([
            'name' => 'laravel-payhere/laravel-payhere',
        ]);
});

it('can not get a invalid package', function () {
    $data = Packagist::getPackageWithStats('invalid-package');

    expect($data)
        ->toBeNull();
});
