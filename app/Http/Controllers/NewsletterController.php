<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Repositories\Contracts\NewsletterSubscriberRepository;
use Illuminate\Http\Request;

final class NewsletterController
{
    public function confirmSubscription(Request $request)
    {
        $newsletterSubscriberRepository = app(NewsletterSubscriberRepository::class);

        $newsletterSubscriberRepository->verifyEmail(
            email: $request->email
        );

        return view('newsletter.subscription-confirmed');
    }

    public function unsubscribe(Request $request)
    {
        $newsletterSubscriberRepository = app(NewsletterSubscriberRepository::class);

        $newsletterSubscriberRepository->deleteSubscriber(
            email: $request->email
        );

        return view('newsletter.unsubscribed');
    }
}
