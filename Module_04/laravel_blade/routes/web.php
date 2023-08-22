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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('home', ['name' => 'Ivan', 'age' => '11', 'position' => 'developer', 'address' => 'Moscow-1']);
});

Route::get('/contacts', function () {
    return view('contacts', ['address' => 'Moscow-2', 'post_code' => 124578, 'age' => 18, 'email' => '', 'phone' => '1234567890']);
});
