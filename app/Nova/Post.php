<?php

declare(strict_types=1);

namespace App\Nova;

use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Markdown;
use Laravel\Nova\Fields\Slug;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\URL;
use Laravel\Nova\Http\Requests\NovaRequest;

final class Post extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Post>
     */
    public static string $model = \App\Models\Post::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'title';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'title',
    ];

    /**
     * Get the fields displayed by the resource.
     */
    public function fields(NovaRequest $request): array
    {
        return [
            ID::make()->sortable(),

            Text::make('Title')
                ->rules('required', 'max:60')
                ->maxlength(60)
                ->enforceMaxlength(),

            URL::make('Link', fn () => route('show-post', $this->slug)),

            Slug::make('Slug')
                ->from('Title')
                ->rules('required', 'max:255')
                ->hideFromIndex(),

            Textarea::make('Excerpt')
                ->rules('required'),

            Image::make('Banner')
                ->rules('image')
                ->path('blog'),

            Markdown::make('Content')
                ->rules('required')
                ->withFiles('public', 'blog'),

            Date::make('Published At')
                ->rules('sometimes:date')
                ->onlyOnDetail(),
        ];
    }

    /**
     * Get the actions available for the resource.
     */
    public function actions(NovaRequest $request): array
    {
        return [
            new Actions\PreviewBlogPost,
            new Actions\PublishBlogPost,
        ];
    }
}
