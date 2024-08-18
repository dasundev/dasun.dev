<?php

declare(strict_types=1);

use App\Models\Post;

test('rss feed renders successfully', function () {
    $post = Post::factory()->create();

    $response = $this->get('/feed');

    $response
        ->assertStatus(200)
        ->assertSee($post->title);
});
