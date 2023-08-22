<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade; // Обязательно указать!

/**
 * 4.5 Хелперы. Работы с формами
 */
class BladeHelperServiceProvider extends ServiceProvider
{
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
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('headerUpperCase', function ($text) { // Создание Blade-директивы @headerUpperCase

            return "<?php echo '<h1>' . strtoupper($text) . '-h1</h1>' ?>"; // Обязательно должен возвращаться
            // исполняемый
            // php-код
        });
    }
}
