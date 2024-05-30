# Recurring API

PayHere [Recurring API](https://support.payhere.lk/api-&-mobile-sdk/recurring-api) enables you to accept recurring payments from your customers. With this feature, customers only need to enter their card credentials once, and thereafter, their card will be automatically charged at intervals you specify, and as authorized by the customer.

```php{13-16}
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
            ->recurring(
                recurrence: '1 Month',
                duration: '1 Year'
            )
            ->checkout();
    }
}
```
