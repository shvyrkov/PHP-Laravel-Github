<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        // В POST-запросе не будет требоваться @csrf-токен. В ПРОДе так делать нельзя!
        '/test_parameters', // 5.2 Получение параметров запроса
        '/parse_json', // 5.6 Обработка raw JSON
    ];
}
