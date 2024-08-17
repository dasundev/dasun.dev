@component('mail::message')
# Congratulations on Your New License!

Dear {{ $license->user->name }},

I am pleased to inform you that a new license has been issued to you. Here are the details of your new license:

- License name: {{ $license->name }}
- License key: {{ $license->key }}
- Applicable package(s): {{ $license->purchasable->name }}
- Expires at: {{ $license->expires_at->format('M 5, Y') }}

All licenses are managed through your account on [dasun.dev](https://www.dasun.dev). If an account hasn’t been created for you yet, one will be automatically generated. You can reset your password and log in to access your dashboard.

@component('mail::button', ['url' => route('dashboard')])
View License
@endcomponent

If you have any questions or need further assistance, please feel free to contact me.

Thank you for your purchase!

Best regards,<br>
Dasun Tharanga
@endcomponent
