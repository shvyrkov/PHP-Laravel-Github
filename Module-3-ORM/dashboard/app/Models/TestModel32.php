<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 3.2 Создание сущности
 */
class TestModel32 extends Model
{
    use HasFactory;

    /** @var string  - Явное указание имени таблицы в БД  */
    protected  $table = 'test'; // По умолчанию -'test_models'

    /** @var string - Явное указание типа подключения - см. database.php - 'connections' */
    protected $connection = 'pgsql'; // Здесь будет исп-ся - PostgreSQL, 'mysql' - по умолчанию.

    /** @var string - Явное указание колонки первичного ключа  */
    protected $primaryKey = 'test_id'; // 'test_id' - имя колонки первичного ключа в таблице, 'id' - по умолчанию.

    /** @var bool - Явное указание автоинкремента для первичного ключа  */
    public $incrementing = true;

    /** @var bool - активация TimeStamp - время изменения/добавления строки в таблице */
    public $timestamps = true; // При создании табл. авт-ски будут созданы поля 'created_at', 'updated_at'

    // ----- Задание полей талицы -----------
    protected $attributes = ['test_attr_1', 'test_attr_2'];




}
