<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
    ];

    /**
     * Встроенный метод для обработки Событий Модели.
     * Если используетс Наблюдатель, то вся логика переносится туда.
     * @return void
     */
//    protected static function boot()
//    {
//        parent::boot(); // TODO: Change the autogenerated stub
//
//        static::updating(function (News $news) {
//            \Log::info('Updating news - ' . $news);
//        });
//    }
}
