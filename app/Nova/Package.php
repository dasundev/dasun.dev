<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Fields\FormData;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
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

            Text::make('Composer package', 'composer_package')
                ->sortable()
                ->placeholder('dasundev/livewire-dropzone')
                ->creationRules('required', 'string', 'unique:packages,composer_package')
                ->updateRules('required', 'string', 'unique:packages,composer_package,{{resourceId}}'),

            Text::make('Slug', 'slug')
                ->creationRules('required', 'string', 'unique:packages,slug')
                ->updateRules('required', 'string', 'unique:packages,slug,{{resourceId}}')
                ->dependsOn('composer_package', function (Text $field, NovaRequest $request, FormData $formData) {
                    if (! empty($formData->get('composer_package'))) {
                        $field->setValue(preg_replace('/^[^\/]+\//', '', $formData['composer_package']));
                    }
                })
                ->hideFromIndex(),

            Boolean::make('Premium', 'is_premium')
                ->sortable()
                ->rules('sometimes', 'boolean'),

            Text::make('Package name', 'name')
                ->sortable()
                ->hide()
                ->dependsOn('is_premium', function (Text $field, NovaRequest $request, FormData $formData) {
                    if ($formData->boolean('is_premium') === true) {
                        $field->show()->rules('required', 'string');
                    }
                })
                ->hideFromIndex(),

            Textarea::make('Package description', 'description')
                ->sortable()
                ->hide()
                ->dependsOn('is_premium', function (Textarea $field, NovaRequest $request, FormData $formData) {
                    if ($formData->boolean('is_premium') === true) {
                        $field->show()->rules('required', 'string');
                    }
                })
                ->hideFromIndex(),

            Image::make('Thumbnail', 'thumbnail')
                ->sortable()
                ->hide()
                ->dependsOn('is_premium', function (Image $field, NovaRequest $request, FormData $formData) {
                    if ($formData->boolean('is_premium') === true) {
                        $field->show()->rules('image')->creationRules('required')->updateRules('image');
                    }
                })
                ->hideFromIndex(),

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
