<?php

namespace App\Services;

/**
 * 8.4 Работа с базой данных внутри сервиса
 */
class CustomLogDbService84 implements CustomLogServiceInterface84
{
    /**
     * @var $queryBuilder - это query builder с заданной в сервис-провайдере таблицей (у нас это CustomLogsProvider84)
     */
    protected $queryBuilder;

    public function __construct($queryBuilder)
    {
        $this->queryBuilder = $queryBuilder;
    }

    public function rotateLogs()
    {
        // Производим необходимые действия с переданным query builder стандартными методами класса DB в Laravel
        $this->queryBuilder->where('id', '<', 5)->delete();
        echo 'Logs deleted';
    }
}
