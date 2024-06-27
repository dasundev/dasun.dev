# Events

Laravel PayHere dispatches events. If you wish to execute any further actions or integrations, you can listen for them. 

If you're new to Laravel Events, you can find more information [here](https://laravel.com/docs/11.x/events#defining-listeners).

## `PaymentVerified`

This event is dispatched when the checkout webhook request confirms successful payment capture.

## `SubscriptionActivated`

This event is dispatched when the recurring webhook request confirms successful subscription activation.
