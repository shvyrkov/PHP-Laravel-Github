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

// Получение всех пользователей из БД
Route::get('/user', [\App\Http\Controllers\UserController::class, 'index']);
// Вывод формы для создания пользователя
Route::get('/user-form', [\App\Http\Controllers\UserController::class, 'create']);
// Получение одного пользователя через id, переданный в параметрах роута
Route::get('/user/{id}', [\App\Http\Controllers\UserController::class, 'get']);
// Запись нового пользователя в базу данных
Route::post('/user-store', [\App\Http\Controllers\UserController::class, 'store']);
// Получение данных о пользователе в виде PDF-файла.
Route::get('/resume/{id}', [\App\Http\Controllers\PdfGeneratorController::class, 'index']);
