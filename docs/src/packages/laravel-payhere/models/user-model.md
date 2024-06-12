# Models: User

To utilize Payoora with your `User` model, ensure that you implement the `PayHereCustomer` contract and use the `Billable` trait. The `Billable` trait provides convenient methods for handling billing-related functionality.

```php
use Dasundev\PayHere\Models\Contracts\PayHereCustomer;
use Illuminate\Database\Eloquent\Model;
use Dasundev\PayHere\Billable;

class User extends Model implements PayHereCustomer
{
    use Billable;

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

By default, Payoora expects your `User` model to be the `App\Models\User` class. However, if you wish to use a different model, you can specify it with the `useCustomerModel` method within the `boot` method of your `AppServiceProvider` class:

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

This configuration ensures that Payoora correctly utilizes your custom `User` model or any other specified model to retrieve the necessary customer data for checkout.
