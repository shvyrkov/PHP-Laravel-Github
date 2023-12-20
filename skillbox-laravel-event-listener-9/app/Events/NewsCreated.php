<?php

namespace App\Events;

use App\Models\News;
//use Illuminate\Broadcasting\Channel;
//use Illuminate\Broadcasting\InteractsWithSockets;
//use Illuminate\Broadcasting\PresenceChannel;
//use Illuminate\Broadcasting\PrivateChannel;
//use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewsCreated
{
    use Dispatchable, SerializesModels;
//    use InteractsWithSockets;

    public News $news;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(News $news)
    {
        $this->news = $news;
        \Log::info('News created, event fired'); // Запись в лог, что событие запущено
    }

    /**
     * Get the channels the event should broadcast on.  - Используется при работе с web-socket - здесь не используется.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
//    public function broadcastOn()
//    {
//        return new PrivateChannel('channel-name');
//    }
}
