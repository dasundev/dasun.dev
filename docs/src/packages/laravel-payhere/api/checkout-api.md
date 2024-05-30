# Checkout API

PayHere [Checkout API](https://support.payhere.lk/api-&-mobile-sdk/checkout-api) is the most commonly used method for processing a checkout. To process a checkout using this API, call the following method within your controller:

```php{10-13}
use Illuminate\Http\Request;
use App\Models\Order;

class CheckoutController extends Controller
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
