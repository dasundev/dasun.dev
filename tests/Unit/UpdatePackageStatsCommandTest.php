<?php

declare(strict_types=1);

test('update package stats', function () {
    $this->artisan('package:update-stats')->assertExitCode(0);
});
