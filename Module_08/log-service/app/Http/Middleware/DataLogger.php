<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Log; // Добавим использование созданной модели.
use Illuminate\Http\Request;

class DataLogger
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse) $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        return $next($request);
    }

    /**
     *  Функция, которая вызывается после посылки ответа пользователю.
     *
     * @param Request $request
     * @param $response
     * @return void
     */
    public function terminate(Request $request, $response)
    {
        if (env('API_DATALOGGER', true)) { // Если в файле .env прописана опция API_DATALOGGER=true, то используем
            // логирование
//            if (env('API_DATALOGGER_USE_DB', false)) { // Если в файле .env прописана опция
            if (env('API_DATALOGGER_USE_DB', true)) { // Если в файле .env прописана опция
                // API_DATALOGGER_USE_DB=true, то для сохранения используем БД иначе просто пишем в файл
                $endTime = microtime(true);
                $log = new Log();
                $log->time = gmdate('Y-m-d H:s:i');
                $log->duration = number_format($endTime - LARAVEL_START, 3);
                $log->ip = $request->ip();
                $log->url = $request->fullUrl();
                $log->method = $request->method();
                $log->input = $request->getContent();
                $log->save(); // Сохранили в БД нашу запись
            } else { // На всякий случай, если опция записи в БД недоступна, то пишем в файл.
                $endTime = microtime(true);
                $fileName = 'api_datalogger_' . date('d-m-y') . '.log';
                $datalog = 'Time: ' . gmdate('Y-m-d H:s:i') . "\n";
                $datalog .= 'Duration: ' . number_format($endTime - LARAVEL_START, 3) . "\n";
                $datalog .= 'IP Address: ' . $request->ip() . "\n";
                $datalog .= 'URL: ' . $request->fullUrl() . "\n";
                $datalog .= 'Method: ' . $request->method() . "\n";
                $datalog .= 'Input: ' . $request->getContent() . "\n";

echo '<pre>';
var_dump($datalog);
echo '<hr>';
echo '</pre>';

                \File::append(storage_path('logs' . DIRECTORY_SEPARATOR . $fileName),
                    $datalog . "\n" . str_repeat("=", 20) . "\n\n"); // Записали в файл
            }
        }
    }
}
