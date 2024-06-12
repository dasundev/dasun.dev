# Subscription Manager API

The PayHere [Subscription Manager API](https://support.payhere.lk/api-&-mobile-sdk/subscription-manager-api) lets you view, retry, and cancel your subscription customers, who were subscribed using the [Recurring API](https://support.payhere.lk/api-&-mobile-sdk/recurring-api).

This API has three endpoints:

- [List all subscriptions](#list-all-subscriptions)
- [List all payments of a subscription](#list-all-payments-of-a-subscription)
- [Retry a subscription](#retry-a-subscription)
- [Cancel a subscription](#cancel-a-subscription)

## List all subscriptions

To list all subscriptions, use the following endpoint:

```http request
GET /payoora/api/subscriptions
```

## List all payments of a subscription

To list all payments of a specific subscription, use the following endpoint:

```http request
GET /payoora/api/subscriptions/:id
```

Replace `:id` with the subscription ID.

## Retry a subscription

To retry a subscription, use the following endpoint:

```http request
POST /payoora/api/subscriptions/:id/retry
```

Replace `:id` with the subscription ID.

## Cancel a subscription

To cancel a subscription, use the following endpoint:

```http request
DELETE /payoora/api/subscriptions/:id
```

Replace `:id` with the subscription ID.
