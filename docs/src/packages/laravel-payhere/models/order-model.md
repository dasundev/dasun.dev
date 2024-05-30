# Models: Order

The table schema for the `Order` model may vary based on your application's requirements. However, Laravel PayHere will utilize your `Order` model to retrieve specific data necessary to initiate the checkout process.

Therefore, it's essential to implement the `PayHereOrder` contract within your `Order` model, as demonstrated below:

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

> The `PayHereOrder` contract requires the implementation of the `payherePayment` relationship.

Laravel PayHere assumes your `Order` model will be the `App\Models\Order` class. If you wish to change this, you may specify a different model via the `useOrderModel` method. This method should typically be called in the `boot` method of your `AppServiceProvider` class:

```php
use App\Models\PayHere\Order;
use Dasundev\PayHere\PayHere;
 
/**
 * Bootstrap any application services.
 */
public function boot(): void
{
    PayHere::useOrderModel(Order::class);
}
```

And also, Laravel PayHere assumes your order lines relationship will be the `lines` relationship. If you wish to change this, you may specify a different relationship via the `useOrderLinesRelationship` method. This method should typically be called in the `boot` method of your `AppServiceProvider` class:

```php
use App\Models\PayHere\Order;
use Dasundev\PayHere\PayHere;
 
/**
 * Bootstrap any application services.
 */
public function boot(): void
{
    PayHere::useOrderLinesRelationship(Order::class);
}
```
