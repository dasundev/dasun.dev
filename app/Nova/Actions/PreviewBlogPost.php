<?php

declare(strict_types=1);

namespace App\Nova\Actions;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Actions\ActionResponse;
use Laravel\Nova\Fields\ActionFields;

final class PreviewBlogPost extends Action
{
    use InteractsWithQueue, Queueable;

    public $name = 'Preview';

    /**
     * Perform the action on the given models.
     */
    public function handle(ActionFields $fields, Collection $models): ActionResponse
    {
        return ActionResponse::openInNewTab(route('show-post', $models[0]));
    }
}
