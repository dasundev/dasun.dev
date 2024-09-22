<?php

declare(strict_types=1);

namespace App\Providers;

use App\Nova\Dashboards\Main;
use App\Nova\License;
use App\Nova\NewsletterSubscriber;
use App\Nova\Order;
use App\Nova\Package;
use App\Nova\Payment;
use App\Nova\Post;
use App\Nova\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\Menu\MenuItem;
use Laravel\Nova\Menu\MenuSection;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;

final class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        $this->registerMenus();
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        return [];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
            ->withAuthenticationRoutes()
            ->withPasswordResetRoutes()
            ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewNova', function ($user) {
            return in_array($user->email, [
                'hello@dasun.dev',
            ]);
        });
    }

    /**
     * Get the dashboards that should be listed in the Nova sidebar.
     *
     * @return array
     */
    protected function dashboards()
    {
        return [
            new Main,
        ];
    }

    /**
     * Register all menu items.
     */
    private function registerMenus(): void
    {
        Nova::mainMenu(function (Request $request) {
            return [
                MenuSection::dashboard(Main::class)->icon('view-grid'),

                MenuSection::make('Blog', [
                    MenuItem::resource(Post::class),
                ])->icon('rss')->collapsable(),

                MenuSection::make('Open Source', [
                    MenuItem::resource(Package::class),
                    MenuItem::resource(License::class),
                ])->icon('heart')->collapsable(),

                MenuSection::make('Customers', [
                    MenuItem::resource(User::class),
                ])->icon('user')->collapsable(),

                MenuSection::make('Newsletter', [
                    MenuItem::resource(NewsletterSubscriber::class),
                ])->icon('mail')->collapsable(),
            ];
        });
    }
}
