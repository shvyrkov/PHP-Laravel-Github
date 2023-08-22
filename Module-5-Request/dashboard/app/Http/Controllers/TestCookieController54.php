<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * 5.4 Работа с cookie и сессиями
 */
class TestCookieController54 extends Controller
{
    public function testCookie(Request $request)
    {
        // У клиента значение куки будет всегда зашифрованным!
        $sessionIdentify = $request->cookie('laravel_session'); // Значение НЕзашифрованное

        echo 'laravel_session id: ' . $sessionIdentify . '<hr>';

        $session = $request->session(); // Получаем данные сессии - объект

//        var_dump($session); // В объекте есть пар-ры: _token, url и др. стандартные пар-ры.

        $sessionToken = $request->session()->get('_token'); // Получаем значение конкретного пар-ра, здесь - _token

        echo 'laravel session _token: ' . $sessionToken . '<hr>';
    }
}
