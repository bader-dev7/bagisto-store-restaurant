<?php

namespace Webkul\CustomTheme\Providers;
use Illuminate\Support\Facades\Blade;

use Illuminate\Support\ServiceProvider;

class CustomThemeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
   public function boot(): void
{
    // تسجيل الـ views من الحزمة
    $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'custom-theme');

    // تسجيل anonymous components
    Blade::anonymousComponentPath(
        __DIR__ . '/../Resources/views/components',
        'custom-theme'
    );
}

}
