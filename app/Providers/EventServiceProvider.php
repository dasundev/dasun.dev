<?php

declare(strict_types=1);

namespace App\Providers;

use App\Events\LicenseCreated;
use App\Events\NewsletterSubscribed;
use App\Listeners\OrderPaid;
use App\Listeners\SendLicenseCreatedNotification;
use App\Listeners\SendNewsletterSubscribeNotification;
use App\Listeners\SyncLicenseFallbackVersion;
use Dasundev\PayHere\Events\PaymentVerified;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

final class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        NewsletterSubscribed::class => [
            SendNewsletterSubscribeNotification::class,
        ],
        PaymentVerified::class => [
            OrderPaid::class,
        ],
        LicenseCreated::class => [
            SyncLicenseFallbackVersion::class,
            SendLicenseCreatedNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
