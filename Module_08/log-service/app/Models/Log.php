<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    /** @var bool  */
    public $timestamps = false; // для избежания ошибок запросов SQL необходимо отключить автоматические метки времени
}
