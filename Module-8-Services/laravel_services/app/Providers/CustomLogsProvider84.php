<?php

namespace App\Providers;

use App\Services\CustomLogDbService84;
use App\Services\CustomLogServiceInterface84;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

/**
 * 8.4 Работа с базой данных внутри сервиса
 */
class CustomLogsProvider84 extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CustomLogServiceInterface84::class, function () { // Тип - интерфейс!!!
            return new CustomLogDbService84(DB::table('logs')); // Передаем query builder для таблицы 'logs'
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
