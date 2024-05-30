# Models: User

Laravel PayHere uses your `User` model to get the data needed to start the checkout process.

To use Laravel PayHere with your `User` model, you need to implement the `PayHereCustomer` contract. Here’s how you can do this:

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

The `PayHereCustomer` contract requires these methods to provide the needed data.

By default, Laravel PayHere expects your `User` model to be the `App\Models\User` class. If you want to use a different model, you can specify it with the `useCustomerModel` method in the `boot` method of your `AppServiceProvider` class, like this:

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

This configuration ensures Laravel PayHere will correctly use your custom `User` model or any other specified model to get the customer data needed for checkout.
