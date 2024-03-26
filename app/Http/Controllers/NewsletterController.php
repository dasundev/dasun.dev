<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\NewsletterSubscriberRepository;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function confirmSubscription(Request $request)
    {
        if (! $request->hasValidSignature()) {
            abort(401);
        }

        $repository = app(NewsletterSubscriberRepository::class);

        $repository->verify(
            email: $request->email
        );

        return response()->json('success');
    }

    public function unsubscribe(Request $request)
    {
        if (! $request->hasValidSignature()) {
            abort(401);
        }

        $repository = app(NewsletterSubscriberRepository::class);

        $repository->deleteSubscriber(
            email: $request->email
        );

        return response()->json('success');
    }
}
