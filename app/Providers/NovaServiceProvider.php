<?php

namespace App\Providers;

use App\Nova\Dashboards\Main;
use App\Nova\Package;
use App\Nova\Post;
use App\Nova\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\Menu\MenuItem;
use Laravel\Nova\Menu\MenuSection;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;

class NovaServiceProvider extends NovaApplicationServiceProvider
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
            new \App\Nova\Dashboards\Main,
        ];
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
                ])->icon('heart')->collapsable(),

                MenuSection::make('Customers', [
                    MenuItem::resource(User::class),
                ])->icon('user')->collapsable(),
            ];
        });
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
}
