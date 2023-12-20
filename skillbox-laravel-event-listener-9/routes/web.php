<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;
use App\Events\NewsCreated;
use \App\Models\News;

// 9.2, 9.3, 9.4
Route::get('/', function () {
    NewsCreated::dispatch(News::first());

    return view('welcome');
});

// 9.5 Встроенные события Моделей
Route::get('/news-update-event', function () {
   News::first()->update(['title' => 'Test-event']);

   return 'updated with event';
});

Route::get('/news-update-without-event', function () {
    News::withoutEvents(function (){
        News::first()->update(['title' => 'Test-without-event']);
    });

   return 'updated without event';
});



// ----------------Old-----------------------------------

//Route::get('/tasks', 'TasksController@index'); // Не работает! Не видит класс контроллера!
Route::get('/tasks', [TasksController::class, 'index']);
Route::get('/tasks/{task}', [TasksController::class, 'show']);

Route::get('/about', function () {
    $name = 'Misha';

    return view('about', ['name' => $name]);
});

Route::get('/contacts', function () {
    return view('contacts');
});

Route::get('/about/us', function () {
    return view('about_us');
});

// test
