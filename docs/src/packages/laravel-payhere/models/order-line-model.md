# Models: Order Line

The table schema for the `OrderLine` model may vary based on your application's requirements. However, Laravel PayHere will utilize your `OrderLine` model to retrieve specific data for order lines necessary to initiate the checkout process.

Therefore, it's essential to implement the `PayHereOrderLine` contract within your `OrderLine` model, as demonstrated below:

```php
use Dasundev\PayHere\Models\Contracts\PayHereOrderLine;

class OrderLine extends Model implements PayHereOrderLine
{
    /**
     * Get the unique identifier of the order line.
     * 
     * @return string
     */
    public function payHereOrderLineId(): string
    {
        return $this->id;
    }
    
    /**
     * Get the title of the order line.
     * 
     * @return string
     */
    public function payHereOrderLineTitle(): string
    {
        return $this->purchasable->name;
    }

    /**
     * Get the quantity of the order line.
     * 
     * @return int
     */
    public function payHereOrderLineQty(): int
    {
        return $this->unit_quantity;
    }

    /**
     * Get the total amount for the order line.
     * 
     * @return float
     */
    public function payHereOrderLineTotal(): float
    {
        return $this->total;
    }

    /**
     * Get the unit amount for the order line.
     * 
     * @return float
     */
    public function payHereOrderLineUnitPrice(): float
    {
        return $this->unit_price;
    }
}
```

> The `PayHereOrderLine` contract requires the implementation of the above methods.
