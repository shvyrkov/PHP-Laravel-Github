<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * 8.2 Инъекция зависимостей
 */
class TestDiController82 extends Controller
{
    /**
     * @param Request $request - это и есть инъекция зависимостей, т.е. передаем ТИПИЗИРОВАННЫЙ пар-р, а далее
     * сервис-контейнер уже знает, какой сервис-провайдер использовать.
     * @return void
     */
    public function showUrl(Request $request)
    {
        echo $request->getUri(); // Вывод URL-запроса
    }
}
