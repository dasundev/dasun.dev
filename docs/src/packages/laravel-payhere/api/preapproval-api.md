# Preapproval API

PayHere [Preapproval API](https://support.payhere.lk/api-&-mobile-sdk/recurring-api) enables you to preapprove your customers for Automated Payments.

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
            ->preapproval()
            ->checkout();
    }
}
```
