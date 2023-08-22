<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * 5.6 Обработка raw JSON
 */
class JsonParseController56 extends Controller
{
    /**
     * Получение данных из входящего JSON-объекта
     * @param Request $request
     * @return void
     */
    public function parseJson(Request $request)
    {
        echo 'Получение данных из входящего JSON-объекта. <hr>';

        echo '1. Встроенный в Laravel метод Request::json(): <br>';
        var_dump($request->json()->all()); // array (size=2)...
        echo '<hr>';

        echo '2. Нативная ф-ция php json_decode(): <br>';
        var_dump(json_decode($request->getContent())); // object(stdClass)[289]...
        echo '<hr>';

        echo '3. Получение значения конкретного поля из json:  <br>';
        echo $request->json()->get('first_name');
        echo '<hr>';
    }
}
