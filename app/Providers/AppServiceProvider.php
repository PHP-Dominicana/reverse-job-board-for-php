<?php

namespace App\Providers;

use App\Actions\Developer\UpdatesUserDeveloperInformation;
use App\View\Components\Developers\Item as DevelopersItem;
use App\View\Components\icons\DefaultLogo;
use App\View\Components\MainMenu;
use App\View\Components\Select;
use App\View\Components\Textarea;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->registerComponents();
        $this->registerActions();
    }

    public function registerActions(): void
    {
        app()->singleton(UpdatesUserDeveloperInformation::class, function () {
            return new UpdatesUserDeveloperInformation();
        });
    }

    public function registerComponents(): void
    {
        Blade::component('main-menu', MainMenu::class);
        Blade::component('textarea', Textarea::class);
        Blade::component('select', Select::class);
        Blade::component('developers.item', DevelopersItem::class);
        Blade::component('icons.default-log', DefaultLogo::class);
    }
}
