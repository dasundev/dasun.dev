# Billable Methods

Billable methods allow you to attach additional data to the PayHere checkout process.

## `item()`

Use the `item` method to customize the item name during checkout. By default, Laravel PayHere names it `Order #{$order->id}`.

```php{4}
$request
    ->user()
    ->newOrder($order)
    ->item('Taxi Hire')
    ->checkout();
```

## `startupFee()`

Use the `startupFee` method to add an **additional fee** or **discount** to the first payment when using the [Recurring API](api/recurring-api.md).

```php{8}
$request
    ->user()
    ->newOrder($order)
    ->recurring(
        recurrence: '1 Month',
        duration: '1 Year'
    )
    ->startupFee($discount)
    ->checkout();
```
