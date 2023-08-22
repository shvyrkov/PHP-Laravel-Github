<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 6.2 Биндинг данных формы
 */
class Employee extends Model
{
    use HasFactory;

    /**
     * @var string[] - поля, которые РАЗРЕШЕНЫ к заполнению из формы.
     */
    public $fillable = ['first_name', 'last_name', 'department'];
}
