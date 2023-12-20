<?php

namespace App\Observers;

use App\Models\News;

class NewsObserver
{
    /**
     * Handle the News "updated" event.
     *
     * @param News $news
     * @return void
     */
    public function updating(News $news)
    {
        \Log::info('Updating news - ' . $news);
    }

    // ----------------Не нужно---------------
    /**
     * Handle the News "created" event.
     *
     * @param News $news
     * @return void
     */
    public function created(News $news)
    {
        //
    }

    /**
     * Handle the News "updated" event.
     *
     * @param News $news
     * @return void
     */
    public function updated(News $news)
    {
        //
    }

    /**
     * Handle the News "deleted" event.
     *
     * @param News $news
     * @return void
     */
    public function deleted(News $news)
    {
        //
    }

    /**
     * Handle the News "restored" event.
     *
     * @param News $news
     * @return void
     */
    public function restored(News $news)
    {
        //
    }

    /**
     * Handle the News "force deleted" event.
     *
     * @param News $news
     * @return void
     */
    public function forceDeleted(News $news)
    {
        //
    }
}
