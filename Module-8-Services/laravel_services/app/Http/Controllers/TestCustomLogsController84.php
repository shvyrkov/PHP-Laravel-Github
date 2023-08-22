<?php

namespace App\Http\Controllers;

use App\Providers\CustomLogsProvider84;
use App\Services\CustomLogDbService84;
use App\Services\CustomLogServiceInterface84;
use Illuminate\Http\Request;

/**
 * 8.4 Работа с базой данных внутри сервиса
 */
class TestCustomLogsController84 extends Controller
{
    public function showUrl(Request              $request,
        // Добавляем новую зависимость от нашего сервиса - интерфейс - это лучше, чем класс, т.к. код будет более гибким
                            CustomLogServiceInterface84 $customLog)
    {
        echo $request->getUri() . '<hr>'; // Вывод URL-запроса
        $customLog->rotateLogs();
    }
}
