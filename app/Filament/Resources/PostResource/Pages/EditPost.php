<?php

declare(strict_types=1);

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use App\Models\Post;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Filament\Support\Colors\Color;

final class EditPost extends EditRecord
{
    protected static string $resource = PostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->hidden(fn (Post $post) => $post->isPublished()),
            Actions\Action::make('Publish')
                ->modalHeading('Publish Post')
                ->action(function (Post $post) {
                    $post->markAsPublished();

                    Notification::make()
                        ->title('Published')
                        ->success()
                        ->send();
                })
                ->color(Color::Green)
                ->requiresConfirmation()
                ->hidden(fn (Post $post) => $post->isPublished()),
            Actions\Action::make('preview')
                ->url(fn (Post $post) => route('blog-post', ['slug' => $post->slug]))
                ->openUrlInNewTab(),
        ];
    }
}
