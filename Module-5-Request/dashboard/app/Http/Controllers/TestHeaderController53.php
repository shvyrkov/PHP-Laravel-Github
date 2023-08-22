<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * 5.3 Получение заголовков запроса
 */
class TestHeaderController53 extends Controller
{
    public function testHeader(Request $request)
    {
        $userAgent = $request->header('User-Agent'); // Заголовок 'User-Agent' говорит о том откуда был отправлен
        // запрос. Например из браузера или Postman-a. Можно исп-ть для статистики посещения сайта.

        echo 'User-Agent: ' . $userAgent;
        echo ' <br> ';

        if ($request->hasHeader('My-Header')) {
            echo 'My-Header: ' . $request->header('My-Header');
        }

        echo ' <br> ';
        echo 'My-Header (test Default value): ' . $request->header('My-Header', 'Default value'); // Если заголовка
        // нет, то будет возвращено 'Default value'

        echo '<hr>All headers: <br> ';
       var_dump($request->header());
    }
}
