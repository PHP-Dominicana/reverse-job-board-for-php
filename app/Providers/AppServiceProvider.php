<?php

namespace App\Providers;

use App\Actions\Developer\UpdatesUserDeveloperInformation;
use App\View\Components\MainMenu;
use App\View\Components\Select;
use App\View\Components\Textarea;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

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
        Blade::component('main-menu', MainMenu::class);
        Blade::component('textarea', Textarea::class);
        Blade::component('select', Select::class);
        $this->developerActions();
    }

    public function developerActions(): void
    {
        app()->singleton(UpdatesUserDeveloperInformation::class, function () {
            return new UpdatesUserDeveloperInformation();
        });
    }
}
