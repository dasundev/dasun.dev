<?php

declare(strict_types=1);

namespace Tests\Feature\Livewire;

use App\Livewire\Newsletter;
use App\Models\NewsletterSubscriber;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Livewire\Livewire;
use Tests\TestCase;

final class NewsletterTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function renders_successfully()
    {
        Livewire::test(Newsletter::class)
            ->assertStatus(200)
            ->assertSee('newsletter');
    }

    /** @test */
    public function can_set_email()
    {
        Livewire::test(Newsletter::class)
            ->set('email', 'hello@dasun.dev')
            ->assertSet('email', 'hello@dasun.dev')
            ->assertHasNoErrors();
    }

    /** @test */
    public function email_field_is_required()
    {
        Livewire::test(Newsletter::class)
            ->set('email', '')
            ->call('subscribe')
            ->assertHasErrors(['email' => 'required']);
    }

    /** @test */
    public function email_field_has_a_valid_email()
    {
        Livewire::test(Newsletter::class)
            ->set('email', 'invalid-email')
            ->call('subscribe')
            ->assertHasErrors(['email' => 'email']);
    }

    /** @test */
    public function user_can_subscribe()
    {
        Livewire::test(Newsletter::class)
            ->set('email', 'hello@dasun.dev')
            ->call('subscribe')
            ->assertDispatched('subscribed')
            ->assertHasNoErrors();
    }

    /** @test */
    public function user_cannot_subscribe_more_than_onetime()
    {
        for ($x = 0; $x <= 3; $x++) {
            Livewire::test(Newsletter::class)
                ->set('email', 'hello@dasun.dev')
                ->call('subscribe')
                ->assertDispatched('subscribed')
                ->assertHasNoErrors();
        }

        $this->assertCount(1, NewsletterSubscriber::all());
    }
}
