<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\RequestTestController52;

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

// 5.2 Получение параметров запроса
Route::get('/test_parameters', [RequestTestController52::class, 'testRequest']);
Route::post('/test_parameters', [RequestTestController52::class, 'testRequest']);
//5.3 Получение заголовков запроса
Route::get('/test_header', [\App\Http\Controllers\TestHeaderController53::class, 'testHeader']);
// 5.4 Работа с cookie и сессиями
Route::get('/test_cookie', [\App\Http\Controllers\TestCookieController54::class, 'testCookie']);
// 5.5 Передача файлов в запросе
Route::get('/file_upload', [\App\Http\Controllers\FileUploadController55::class, 'showForm'])->name('show_form'); //
// Вывод формы
Route::post('/file_upload', [\App\Http\Controllers\FileUploadController55::class, 'fileUpload'])->name('upload_file')
; // Загрузка файла
// 5.6 Обработка raw JSON
Route::post('/parse_json', [\App\Http\Controllers\JsonParseController56::class, 'parseJson']);
