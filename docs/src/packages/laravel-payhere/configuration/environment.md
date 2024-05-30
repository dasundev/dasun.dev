# Environment

| KEY                       | DESCRIPTION                                      |
|---------------------------|--------------------------------------------------|
| `PAYHERE_MERCHANT_ID`     | Your PayHere merchant ID                         |
| `PAYHERE_MERCHANT_SECRET` | Your PayHere merchant secret key                 |
| `PAYHERE_APP_ID`          | Your PayHere application ID                      |
| `PAYHERE_APP_SECRET`      | Your PayHere application secret key              |
| `PAYHERE_CURRENCY`        | The currency for transactions (e.g., LKR)        |
| `PAYHERE_NOTIFY_URL`      | The URL for payment notifications                |
| `PAYHERE_RETURN_URL`      | The URL to redirect customers after payment      |
| `PAYHERE_CANCEL_URL`      | The URL to redirect customers after cancellation |
| `PAYHERE_BASE_URL`        | The base URL for the PayHere API	                |

## `PAYHERE_MERCHANT_ID`

Your merchant ID is essential for identifying your merchant account when connecting to the PayHere API. You can find your merchant ID at [PayHere Merchant Domains](https://www.payhere.lk/merchant/domains).

## `PAYHERE_MERCHANT_SECRET`

Your merchant secret is crucial for accessing your merchant account when connecting to the PayHere API. Follow these steps to generate a Merchant Secret:

1. Navigate to the **Side Menu > Integrations** section of your PayHere Account.
2. Click **'Add Domain/App'** > Enter your top-level domain or App package name > Click **'Request to Allow'**.
3. Wait for the approval for your domain/app (This may take up to 24 hours).
4. Copy the Merchant Secret displayed next to your domain/app.

## `PAYHERE_BASE_URL` (optional)

This API Base URL is crucial for connecting to the PayHere API. By default, it's set to the sandbox URL. Make sure to switch to the live URL when your application goes live.

- **Live URL:** [https://www.payhere.lk](https://www.payhere.lk)
- **Sandbox URL:** [https://sandbox.payhere.lk](https://sandbox.payhere.lk)

## `PAYHERE_APP_ID` (optional)

This is the App ID provided by PayHere for your API Key. You can find your App ID at [PayHere Merchant Settings](https://sandbox.payhere.lk/merchant/settings).

This environment key is used to work with REST APIs only.

## `PAYHERE_APP_SECRET` (optional)

This is the App Secret provided by PayHere for your API Key. You can find your App Secret at [PayHere Merchant Settings](https://sandbox.payhere.lk/merchant/settings).

This environment key is used to work with REST APIs only.

## `PAYHERE_CURRENCY` (optional)

Customize the currency settings according to your preferences. PayHere supports payments in the following currencies:

- `LKR`
- `USD`
- `EUR`
- `GBP`
- `AUD`

Laravel PayHere uses a default currency of `LKR`.

## `PAYHERE_NOTIFY_URL` (optional)

Laravel PayHere uses a default secure notify URL. You can set a new notify URL only if needed.

## `PAYHERE_RETURN_URL` (optional)

Laravel PayHere uses a default secure return URL. You can set a new return URL only if needed.

## `PAYHERE_CANCEL_URL` (optional)

Laravel PayHere uses a default cancel URL. You can set a new cancel URL only if needed.
