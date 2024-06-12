# Refund API

The PayHere [Refund API](https://support.payhere.lk/api-&-mobile-sdk/refund-api) enables you to refund your payments.

This REST API requires an HTTP call to the following endpoint:

```http request
POST /payoora/api/payments/refund
```

Parameters:

- `payment_id`: The identifier of the payment to be refunded.
- `description`: Additional details about the refund request.
