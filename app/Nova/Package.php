<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Fields\FormData;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

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
                ->creationRules('required', 'string', 'unique:packages,name')
                ->updateRules('required', 'string', 'unique:packages,name,{{resourceId}}'),

            Text::make('Slug', 'slug')
                ->creationRules('required', 'string', 'unique:packages,slug')
                ->updateRules('required', 'string', 'unique:packages,slug,{{resourceId}}')
                ->dependsOn('name', function (Text $field, NovaRequest $request, FormData $formData) {
                    if (! empty($formData->get('name'))) {
                        $field->setValue(preg_replace('/^[^\/]+\//', '', $formData['name']));
                    }
                })
                ->hideFromIndex(),

            Boolean::make('Premium', 'is_premium')
                ->sortable()
                ->rules('sometimes', 'boolean'),

            Text::make('Anystack Product ID', 'anystack_product_id')
                ->sortable()
                ->hide()
                ->dependsOn('is_premium', function (Text $field, NovaRequest $request, FormData $formData) {
                    if ($formData->boolean('is_premium') === true) {
                        $field->show()->rules('required', 'string');
                    }
                })
                ->hideFromIndex(),

            Currency::make('Price', 'price')
                ->sortable()
                ->hide()
                ->dependsOn('is_premium', function (Text $field, NovaRequest $request, FormData $formData) {
                    if ($formData->boolean('is_premium') === true) {
                        $field->show()->rules('required', 'integer');
                    }
                })
                ->hideFromIndex(),

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
}
