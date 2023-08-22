<?php

namespace App\Http\Controllers;

use App\Services\SmsSenderInterface85;
use Illuminate\Http\Request;

/**
 * 8.5 Создание собственного сервиса
 */
class TestAppServiceController85 extends Controller
{
    /**
     * @param SmsSenderInterface85 $sender
     * @return void
     */
    public function sendSms(SmsSenderInterface85 $sender)
    {
        $sender->send('Hello, World!');
    }
}
