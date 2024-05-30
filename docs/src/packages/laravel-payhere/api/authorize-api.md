# Authorize API

PayHere [Authorize API](https://support.payhere.lk/api-&-mobile-sdk/authorize-api) enables you to obtain customer authorization specifically for Hold on Card payments.

```php{13}
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
            ->authorize()
            ->checkout();
    }
}
```
