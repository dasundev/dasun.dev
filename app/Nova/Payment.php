<?php

namespace App\Nova;

use Dasundev\PayHere\Models\Payment as PaymentModel;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;

class Payment extends Resource
{
    public static string $model = PaymentModel::class;

    public static $title = 'id';

    public static $search = [
        'id',
        'order_id',
        'payment_id',
        'captured_amount',
        'status_message',
        'card_holder_name',
        'card_no',
        'card_expiry',
    ];

    public function fields(Request $request): array
    {
        return [
            ID::make()->sortable(),

            BelongsTo::make('Order', 'order', Order::class)
                ->hideWhenCreating()
                ->hideWhenUpdating(),

            BelongsTo::make('User', 'user', User::class)
                ->hideWhenCreating()
                ->hideWhenUpdating(),

            Text::make('Payment Id', 'payment_id')
                ->sortable()
                ->hideWhenCreating()
                ->hideWhenUpdating(),

            Currency::make('Amount', 'captured_amount')
                ->sortable()
                ->hideWhenCreating()
                ->hideWhenUpdating(),

            Text::make('Status Message', 'status_message')
                ->sortable()
                ->hideWhenCreating()
                ->hideWhenUpdating(),

            Text::make('Card Holder Name', 'card_holder_name')
                ->sortable()
                ->hideWhenCreating()
                ->hideWhenUpdating(),

            Text::make('Card No', 'card_no')
                ->sortable()
                ->hideWhenCreating()
                ->hideWhenUpdating(),

            Text::make('Card Expiry', 'card_expiry')
                ->sortable()
                ->hideWhenCreating()
                ->hideWhenUpdating(),
        ];
    }

    public static function authorizedToCreate(Request $request): bool
    {
        return false;
    }

    public function authorizedToUpdate(Request $request): bool
    {
        return false;
    }
}
