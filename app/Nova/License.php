<?php

namespace App\Nova;

use App\Models\License as LicenseModel;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\MorphTo;
use Laravel\Nova\Fields\Text;

class License extends Resource
{
    public static string $model = LicenseModel::class;

    public static $title = 'name';

    public static $search = [
        'id', 'name', 'key',
    ];

    public function fields(Request $request): array
    {
        return [
            ID::make()->sortable(),

            BelongsTo::make('User', 'user', User::class)
                ->searchable(),

            BelongsTo::make('Order', 'order', Order::class)
                ->searchable(),

            Text::make('Licence name', 'name')
                ->sortable()
                ->rules('required', 'string'),

            Text::make('License key', 'key')
                ->sortable()
                ->rules('required', 'string'),

            Date::make('Expires At', 'expires_at')
                ->sortable()
                ->rules('required', 'date'),
        ];
    }

    public function cards(Request $request): array
    {
        return [];
    }

    public function filters(Request $request): array
    {
        return [];
    }

    public function lenses(Request $request): array
    {
        return [];
    }

    public function actions(Request $request): array
    {
        return [];
    }
}
