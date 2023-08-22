<?php

namespace App\Console\Commands;

use App\Models\Employee;
use Illuminate\Console\Command;


/**
 * 3.4 Добавление, обновление и удаление данных
 */
class TestDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'database:test_insert'; // То что надо написать в строке консоли.

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle() // То что будет делать команда
    {
        // 1. Добавление записи в табл.БД 'employees'
        for ($i = 1; $i < 5; $i++) {
            $employee = new Employee(); // Создаем экземпляр (переменная) модели - это будет строка в таблице.
            $employee->first_name = 'Yuri-' . $i; // Переменной модели устанавливаются атрибуты
            $employee->save(); // Сохраняем в БД, т.е. СОЗДАЕМ новую запись
        }

        // 2. Обновление записи в БД
//        $employee = Employee::where('id', 5)->first(); // Получаем запись из БД по id через Query Builder -
        // возвращает массив, first() - возвращает объект
//        $employee->first_name = 'Joseph'; // Задаем новое значение
//        $employee->save(); // Сохраняем в БД, т.е. ОБНОВЛЯЕМ запись

        // 3. Удаление записи в БД
//        Employee::where('id', 4)->delete();

        return 0;
    }
}
