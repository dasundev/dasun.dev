# Refund

If you need to refund an order without directly calling the [Refund API](api/refund-api.md), you can use the `HasRefund` trait. This allows you to handle refunds efficiently within your application.

```php
use Dasundev\Payoora\Concerns\HasRefund;

class Order extends Model implements PayHereOrder
{
    use HasRefund;
}

// Refund an order.
Order::find('ORD1234')->refund();
```
