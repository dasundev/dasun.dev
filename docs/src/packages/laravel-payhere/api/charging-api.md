# Charging API

The PayHere [Charging API](https://support.payhere.lk/api-&-mobile-sdk/charging-api)  enables you to charge your pre-approved customers on demand. 

This REST API requires an HTTP call to the following endpoint:

```http request
POST /payhere/api/payments/charge
```

Parameters:

- `order_id`: The identifier for the order.
- `type`: Indicates the type of transaction (PAYMENT or AUTHORIZE).
- `custom_1` (optional): Custom parameter 1.
- `custom_2` (optional): Custom parameter 2.



