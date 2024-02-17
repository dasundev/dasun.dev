<?php

namespace Tests\Feature\Livewire;

use App\Livewire\Blog;
use App\Models\Post;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Str;
use Livewire\Livewire;
use Tests\TestCase;

class BlogTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function renders_successfully()
    {
        Livewire::test(Blog::class)
            ->assertStatus(200)
            ->assertSee('Blog');
    }

    /** @test */
    public function displays_posts()
    {
        Post::factory()->create([
            'title' => 'foo',
            'slug' => Str::slug('foo'),
            'content' => 'bar',
            'published_at' => now(),
        ]);

        Livewire::test(Blog::class)
            ->assertViewHas('posts', function ($posts) {
                return $posts->count() === 1;
            });
    }

    /** @test */
    public function does_not_display_draft_posts()
    {
        Post::factory()->draft()->create([
            'title' => 'foo',
            'slug' => Str::slug('foo'),
            'content' => 'bar',
        ]);

        Livewire::test(Blog::class)
            ->assertViewHas('posts', function ($posts) {
                return $posts->isEmpty();
            });
    }
}
