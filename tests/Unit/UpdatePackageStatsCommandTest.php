<?php

test('update package stats', function () {
    $this->artisan('package:update-stats')->assertExitCode(0);
});
