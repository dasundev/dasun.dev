<?php

declare(strict_types=1);

it('can render the nova login page', function () {
    $response = $this->get('/admin/login');

    $response->assertStatus(200);
});
