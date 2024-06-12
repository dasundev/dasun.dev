# Models: Order

The table schema for the `Order` model may vary based on your application's requirements. However, Payoora will utilize your `Order` model to retrieve the order data necessary to initiate the checkout process.

To use Payoora with your `Order` model, you need to implement the `PayHereOrder` contract. Here’s how you can do this:

```php
use Dasundev\PayHere\Models\Contracts\PayHereOrder;

class Order extends Model implements PayHereOrder
{
    /**
     * Define the relationship with the Payment model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function payherePayment(): HasOne
    {
        return $this->hasOne(Payment::class);
    }
}
```

The `PayHereOrder` contract requires the implementation of the `payherePayment` relationship.

Payoora assumes your `Order` model will be the `App\Models\Order` class. If you wish to change this, you may specify a different model via the `useOrderModel` method. This method should typically be called in the `boot` method of your `AppServiceProvider` class:

```php{9}
use App\Models\Order;
use Dasundev\PayHere\PayHere;

/**
 * Bootstrap any application services.
 */
public function boot(): void
{
    PayHere::useOrderModel(Order::class);
}
```

Additionally, Payoora assumes your order lines relationship will be the `lines`. If you wish to change this, you may specify a different relationship via the `useOrderLinesRelationship` method. This method should also typically be called in the `boot` method of your `AppServiceProvider` class:

```php{10}
use App\Models\Order;
use Dasundev\PayHere\PayHere;

/**
 * Bootstrap any application services.
 */
public function boot(): void
{
    PayHere::useOrderModel(Order::class);
    PayHere::useOrderLinesRelationship(Order::class);
}
```
