<?php

namespace App\Nova;

use App\Models\OrderLine as OrderLineModel;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\MorphTo;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;

class OrderLine extends Resource
{
    public static string $model = OrderLineModel::class;

    public static $title = 'id';

    public static $search = [
        'id', 'order_id', 'purchasable_type'
    ];

    public function fields(Request $request): array
    {
        return [
            ID::make()->sortable(),

            BelongsTo::make('Order', 'order', Order::class),

            MorphTo::make('Purchasable', 'purchasable')
                ->sortable(),

            Currency::make('Unit Price', 'unit_price')
                ->sortable(),

            Number::make('Unit Quantity', 'unit_quantity')
                ->sortable(),

            Currency::make('Total', 'total')
                ->sortable()
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
