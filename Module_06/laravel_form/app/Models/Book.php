<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    /**
     * @var string[] - поля, которые РАЗРЕШЕНЫ к заполнению из формы.
     */
    public $fillable = ['title', 'author', 'year_of_publication', 'genre'];
}
