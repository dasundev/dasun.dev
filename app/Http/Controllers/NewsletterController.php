<?php

namespace App\Http\Controllers;

use App\Models\NewsletterSubscriber;
use App\Repositories\Contracts\NewsletterSubscriberRepository;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function confirmSubscription(Request $request, NewsletterSubscriber $subscriber)
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
}
