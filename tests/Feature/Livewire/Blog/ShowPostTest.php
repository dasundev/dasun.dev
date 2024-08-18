<?php

declare(strict_types=1);

namespace Tests\Feature\Livewire\Blog;

use App\Livewire\Blog\ShowPost;
use App\Models\Post;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Livewire\Livewire;
use Tests\TestCase;

final class ShowPostTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function guest_user_can_read_published_post()
    {
        $post = Post::factory()->create();

        Livewire::test(ShowPost::class, ['post' => $post])
            ->assertStatus(200)
            ->assertSee($post->title);
    }

    /** @test */
    public function guest_user_can_not_read_unpublished_posts()
    {
        $post = Post::factory()->draft()->create();

        Livewire::test(ShowPost::class, ['post' => $post])
            ->assertStatus(403);
    }

    /** @test */
    public function admin_user_can_read_unpublished_posts()
    {
        $post = Post::factory()->draft()->create();

        Livewire::actingAs(admin())
            ->test(ShowPost::class, ['post' => $post])
            ->assertStatus(200)
            ->assertSee($post->title);
    }
}
