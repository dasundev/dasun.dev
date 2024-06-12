# Capture API

The PayHere [Capture API](https://support.payhere.lk/api-&-mobile-sdk/capture-api) enables you to capture your authorized Hold on Card payments on demand.

This REST API requires an HTTP call to the following endpoint:

```http request
POST /payhere/api/payments/capture
```

Parameters:

- `authorization_token`: Use the `authorization_token` retrieved from the [Authorize API](authorize-api.md) in the request body.
- `amount`: The amount to capture.
- `description`: Additional details about the capture request.
