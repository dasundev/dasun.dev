<?php

namespace App\Nova;

use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class NewsletterSubscriber extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\NewsletterSubscriber>
     */
    public static string $model = \App\Models\NewsletterSubscriber::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'email',
    ];

    public static function label(): string
    {
        return 'Subscribers';
    }

    /**
     * Get the fields displayed by the resource.
     */
    public function fields(NovaRequest $request): array
    {
        return [
            ID::make()->sortable(),
            Text::make('email'),
            Date::make('email_verified_at'),
        ];
    }
}
