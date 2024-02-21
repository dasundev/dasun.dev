<?php

namespace Tests\Feature\Livewire;

use App\Livewire\ShowPost;
use App\Models\Post;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Livewire\Livewire;
use Tests\TestCase;

class ShowPostTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function renders_successfully()
    {
        $post = Post::factory()->create();

        Livewire::test(ShowPost::class, ['post' => $post])
            ->assertStatus(200)
            ->assertSee($post->title);
    }
}
