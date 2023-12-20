<?php

namespace App\Listeners;

use App\Events\NewsCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendNewsCreatedNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event. - Содержит логику обработки события.
     *
     * @param  \App\Events\NewsCreated  $event
     * @return false
     */
    public function handle(NewsCreated $event)
    {
        \Log::info('Send News created, listener fired; id: ' . $event->news->id); // Т.к. news - это объект Модели, т.е.строка из БД

        return false; // Остановит цепочку выполнения слушателей по данному событию.
    }
}
