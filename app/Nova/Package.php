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
                ->hideWhenCreating()
                ->hideWhenUpdating(),

            Text::make('GitHub Stars', 'github_stars')
                ->sortable()
                ->hideWhenCreating()
                ->hideWhenUpdating(),

            Text::make('Downloads Total', 'downloads_total')
                ->sortable()
                ->hideWhenCreating()
                ->hideWhenUpdating(),

            Text::make('Repository', 'repository')
                ->sortable()
                ->hideWhenCreating()
                ->hideWhenUpdating(),
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
