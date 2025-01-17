<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

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
        Blade::directive('initials', function ($expression) {
            return "<?php
                \$name = trim($expression);
                \$words = explode(' ', \$name);
                \$firstChar = strtoupper(\$words[0][0] ?? '');
                \$lastChar = strtoupper(\$words[count(\$words) - 1][-1] ?? '');
                echo \$firstChar . \$lastChar;
            ?>";
        });
    }
}
