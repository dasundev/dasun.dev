<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;

class Package extends Resource
{
    public static string $model = \App\Models\Package::class;

    public static $title = 'name';

    public static $search = [
        'name',
    ];

    public function fields(Request $request): array
    {
        return [
            ID::make()->sortable(),

            Text::make('Name', 'name')
                ->sortable()
                ->rules('required', 'string', 'unique:packages,name'),

            Text::make('Description', 'description')
                ->sortable()
                ->rules('nullable', 'string'),

            Text::make('Downloads Total', 'downloads_total')
                ->sortable()
                ->rules('nullable', 'integer'),

            Text::make('Repository', 'repository')
                ->sortable()
                ->rules('nullable', 'string'),
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
