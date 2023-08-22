<?php

namespace App\Services;

/**
 * 8.5 Создание собственного сервиса
 */
interface SmsSenderInterface85
{
    public function send($message);
}
