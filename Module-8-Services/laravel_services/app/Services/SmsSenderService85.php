<?php

namespace App\Services;

use Twilio\Exceptions\ConfigurationException;
use Twilio\Rest\Client as TwilioClient;

/**
 * 8.5 Создание собственного сервиса
 */
class SmsSenderService85 implements SmsSenderInterface85
{
    /**
     * @var TwilioClient
     */
    protected $client;

    /**
     * @param $sid - id пользователя в системе Twilio
     * @param $token - токен
     * @throws ConfigurationException
     */
    public function __construct($sid, $token)
    {
        $this->client = new TwilioClient($sid, $token);
    }

    public function send($message)
    {
        $this->client->messages->create(
            79997771100, // Кому смс
            [
                'from' => 79881110022, // От кого
                'body' => 'Текст сообщения' // А зачем пар-р $message?
            ]
        );
    }
}
