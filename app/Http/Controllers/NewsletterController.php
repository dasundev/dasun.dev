<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\NewsletterSubscriberRepository;
use Illuminate\Http\Request;
use Illuminate\Routing\Exceptions\InvalidSignatureException;

class NewsletterController extends Controller
{
    public function confirmSubscription(Request $request)
    {
        if (! $request->hasValidSignature()) {
            throw new InvalidSignatureException;
        }

        $repository = app(NewsletterSubscriberRepository::class);

        $repository->verify(
            email: $request->email
        );

        return view('newsletter.subscription-confirmed');
    }

    public function unsubscribe(Request $request)
    {
        if (! $request->hasValidSignature()) {
            throw new InvalidSignatureException;
        }

        $repository = app(NewsletterSubscriberRepository::class);

        $repository->deleteSubscriber(
            email: $request->email
        );

        return view('newsletter.unsubscribed');
    }
}
