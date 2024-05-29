@component('mail::message')
# Congratulations on Your New License!

Dear {{ $license->user->name }},

I am pleased to inform you that a new license has been issued to you. Here are the details of your new license:

- License name: {{ $license->name }}
- License key: {{ $license->key }}

@component('mail::button', ['url' => route('dashboard')])
View License
@endcomponent

If you have any questions or need further assistance, please feel free to contact me.

Thank you for your purchase!

Best regards,<br>
Dasun Tharanga
@endcomponent
