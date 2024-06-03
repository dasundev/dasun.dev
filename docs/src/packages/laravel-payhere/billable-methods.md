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
