<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// 8.2 Инъекция зависимостей
Route::get('/check_di', [\App\Http\Controllers\TestDiController82::class, 'showUrl']);

// 8.4 Работа с базой данных внутри сервиса
Route::get('/check_log_service', [\App\Http\Controllers\TestCustomLogsController84::class, 'showUrl']);

// 8.5 Создание собственного сервиса
