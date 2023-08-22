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

// 4.3 Вложенные шаблоны
Route::get('/main', function () {
    return view('mainpage');
});

Route::get('/about', function () {
    return view('about');
});

// 4.4 Blade-директивы
Route::get('/users_list', function () {
    $users = ['Ivan', 'Yuri', 'Petr', 'Nikolay', 'Oleg'];

    return view('users', ['userList' => $users]); // В users.blade будет переменная $userList - именование по ключу!
});

// 4.5 Хелперы. Работы с формами
Route::get('/uppercase', function () {
    return view('testdir45');
});
