<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 3.4 Добавление, обновление и удаление данных
 */
class Employee extends Model
{
    use HasFactory;

    /** @var bool - активация TimeStamp - время изменения/добавления строки в таблице */
    public $timestamps = true; // При создании табл. авт-ски будут созданы поля 'created_at', 'updated_at'

    /**
     * Атрибуты, для которых разрешено массовое присвоение значений.
     *
     * @var array
     */
    protected $fillable = ['first_name', 'age'];

}
