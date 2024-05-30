# Checkout API

The checkout API is the most used one, in order to process a checkout using this API, you just call the following method within your controller:

```php
use Illuminate\Http\Request;
use App\Models\Order;

CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
        $order = Order::find('ORD1234');
        
        return $request
            ->user()
            ->newOrder($order)
            ->checkout();
    }
}
```
