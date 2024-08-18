<?php

declare(strict_types=1);

namespace App\Nova;

use App\Models\Order as OrderModel;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Badge;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;

final class Order extends Resource
{
    public static string $model = OrderModel::class;

    public static $title = 'id';

    public static $search = [
        'id', 'status',
    ];

    public static function label(): string
    {
        return 'Orders';
    }

    public static function authorizedToCreate(Request $request): bool
    {
        return false;
    }

    public function fields(Request $request): array
    {
        return [
            ID::make()->sortable(),

            BelongsTo::make('User', 'user', User::class),

            HasMany::make('Lines', 'lines', OrderLine::class),

            Currency::make('Total', 'total')
                ->sortable()
                ->rules('required', 'integer'),

            Badge::make('Status')->map([
                'unpaid' => 'warning',
                'paid' => 'success',
            ]),
        ];
    }

    public function authorizedToUpdate(Request $request): bool
    {
        return false;
    }

    public function authorizedToReplicate(Request $request): bool
    {
        return false;
    }
}
