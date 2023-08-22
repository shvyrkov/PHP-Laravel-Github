<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestFormController61;
use App\Http\Controllers\EmployeeController62;
use App\Http\Controllers\TestSecurityController63;
use App\Http\Controllers\TestValidationController64;
use App\Http\Controllers\FormBuilderTestController65;
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

// 6.1 Элементы управления формой
Route::get('/form', [TestFormController61::class, 'displayForm'])->name('show_form');
Route::post('/form', [TestFormController61::class, 'postForm'])->name('post_form');

// 6.2 Биндинг данных формы
Route::post('/employee', [EmployeeController62::class, 'store'])->name('store_employee');
// id - опционален, при первом заходе на форму его может не быть:
Route::get('/employee/{id?}', [EmployeeController62::class, 'show'])->name('show_employee');

// 6.3 Обеспечение безопасности формы
Route::get('/security_test', [TestSecurityController63::class, 'show'])->name('show_security_form');
Route::post('/security_test', [TestSecurityController63::class, 'post'])->name('post_security_form');

// 6.4 Валидация формы
Route::get('/test_validation', [TestValidationController64::class, 'show'])->name('show_validation_form');
Route::post('/test_validation', [TestValidationController64::class, 'post'])->name('post_validation_form');

// 6.5 Конструктор форм Laravel
Route::get('/test_builder', [FormBuilderTestController65::class, 'show'])->name('show_builder_test');
Route::post('/test_builder', [FormBuilderTestController65::class, 'post'])->name('post_builder_test');

