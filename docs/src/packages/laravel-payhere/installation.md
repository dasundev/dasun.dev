# Installation via Composer

> [!IMPORTANT]
> Laravel PayHere is a **premium** plugin and requires a license for installation. If you don't have a license key, please purchase one [here](https://www.dasun.dev/checkout/laravel-payhere). To make a purchase, log in to [Dasun's website](https://www.dasun.dev/login) and complete the payment. If you don't have an account, you can register [here](https://www.dasun.dev/register). Once the payment is completed, you can obtain the license key from the [dashboard](https://www.dasun.dev/dashboard).

To install the package, add the following lines to the `repositories` key in your `composer.json` file to gain access to the private package:

```json
{
    "repositories": [
        {
            "type": "composer",
            "url": "https://satis.dasun.dev"
        }
    ]
}
```

Next, require the package via the command line. You will be prompted for your username (which is your email) and your password (which is your license key, e.g., `8c21df8f-6273-4932-b4ba-8bcc723ef500`).

```bash
composer require dasundev/laravel-payhere
```

After installing the package via Composer, you need to install the plugin. The best way to do this is by running the following command:
```bash
php artisan payhere:install
```

This command will publish the migrations, configuration file, and migrate the database.
