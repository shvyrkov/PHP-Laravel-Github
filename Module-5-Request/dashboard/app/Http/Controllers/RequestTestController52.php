<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * 5.2 Получение параметров запроса5.2 Получение параметров запроса
 */
class RequestTestController52 extends Controller
{
    /**
     * @param Request $request - здесь будут ВСЕ данные HTTP-запроса.
     * @return void
     */
    public function testRequest(Request $request)
    {
        // Получаем из формы/запроса значение поля 'first_name', 'No first name' - если значение поля не задано
        // Метод input() работает независимо от типа HTTP-метода (GET, POST, PUT, ...)
        // Для POST, PUT, PATCH, DELETE нужен @csrf-токен. Чтобы обойти это правило надо добавить URL-запроса в
        // исключения в App\Http\Middleware\VerifyCsrfToken.php
        $firstName = $request->input('first_name', 'No first name');
        $lastName = $request->input('last_name', 'No last name');

        echo 'Test input(): <br> First name: ' . $firstName . ', Last name: ' . $lastName . '<hr>';

        // Плучение всех полей сразу
        $requestParameters = $request->all();
        echo 'Test all(): <br>';
        print_r($requestParameters);
        echo '<br>';
        echo 'First name: ' . $requestParameters['first_name'];
        echo '<hr>';

        $requestParameters = $request->collect();
        echo 'Test collect(): <br>';
        var_dump($requestParameters); // object(Illuminate\Support\Collection)... - Коллекция объектов
        echo '<br>';
        $requestParameters->each(function ($field) { // Будут перебраны все поля в запросе.
            echo 'Test collect()->each(): <br> feild: ' . $field . '<hr>';
        });
        echo '<hr>';


    }
}
