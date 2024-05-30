# Models: User

The table schema for the `User` model may vary based on your application's requirements. However, Laravel PayHere will utilize your `User` model to retrieve specific data necessary to initiate the checkout process.

Therefore, it's essential to implement the `PayHereCustomer` contract within your `User` model, as demonstrated below:

```php
use Dasundev\PayHere\Models\Contracts\PayHereCustomer;

class User extends Model implements PayHereCustomer
{
    /**
     * Get the first name of the customer.
     * 
     * @return string
     */
    public function payHereFirstName(): string
    {
        return explode(' ', trim($this->name))[0];
    }

    /**
     * Get the last name of the customer.
     * 
     * @return string
     */
    public function payHereLastName(): string
    {
        return explode(' ', trim($this->name))[1];
    }

    /**
     * Get the email of the customer.
     * 
     * @return string
     */
    public function payHereEmail(): string
    {
        return $this->email;
    }

    /**
     * Get the phone number of the customer.
     * 
     * @return string
     */
    public function payHerePhone(): string
    {
        return $this->phone;
    }

    /**
     * Get the address of the customer.
     * 
     * @return string
     */
    public function payHereAddress(): string
    {
        return $this->address;
    }

    /**
     * Get the city of the customer.
     * 
     * @return string
     */
    public function payHereCity(): string
    {
        return $this->city;
    }

    /**
     * Get the country of the customer.
     * 
     * @return string
     */
    public function payHereCountry(): string
    {
        return $this->country;
    }
}
```

> The `PayHereCustomer` contract requires the implementation of the above methods.

Laravel PayHere assumes your `User` model will be the `App\Models\User` class. If you wish to change this, you may specify a different model via the `useCustomerModel` method. This method should typically be called in the `boot` method of your `AppServiceProvider` class:

```php
use App\Models\PayHere\Customer;
use Dasundev\PayHere\PayHere;
 
/**
 * Bootstrap any application services.
 */
public function boot(): void
{
    PayHere::useCustomerModel(Customer::class);
}
```
