<?php

namespace App\Console\Commands;

use App\Models\Employee;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

/**
 * 3.5 Получение данных из базы
 * 3.6 Сортировка и ограничение
 * 3.7 Группировка данных
 */
class TestDataSelect extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:data-select';

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
    public function handle()
    {
        echo PHP_EOL . '--------------- 3.5 Получение данных из базы  -----------------------' . PHP_EOL;
        echo PHP_EOL . '----------- 1. Получение всех данных из таблицы  --------------------' . PHP_EOL;

        $employees = Employee::all(); // Выдаст коллекцию - массив объектов типа Employee
//        var_dump($employees);
        foreach ($employees as $employee) {
            echo 'id: ' . $employee->id . ' -  name: ' . $employee->first_name . ' - age: ' . $employee->age . PHP_EOL;
//            var_dump($employee);
//            echo '---------------' . PHP_EOL;
        }

        echo PHP_EOL . '----------- 2. Поиск по первичному ключу -----------------------' . PHP_EOL;

        $employee = Employee::find(5);
        echo 'id: ' . $employee->id . ' -  name: ' . $employee->first_name . ' - age: ' . $employee->age . PHP_EOL;

        echo PHP_EOL . '----------- 3. Поиск по условию -----------------------' . PHP_EOL;

        $employees = Employee::where('first_name', 'like', 'John%')->get();
//        var_dump($employees);
        foreach ($employees as $employee) {
            echo 'id: ' . $employee->id . ' -  name: ' . $employee->first_name . ' - age: ' . $employee->age . PHP_EOL;
        }

        echo PHP_EOL . '----------- 4. Поиск по сложному условию типа AND -----------------------' . PHP_EOL;

        $employees = Employee::where('first_name', 'like', 'John%')->where('age', '>', 27)->get();

        foreach ($employees as $employee) {
            echo 'id: ' . $employee->id . ' -  name: ' . $employee->first_name . ' - age: ' . $employee->age . PHP_EOL;
        }

        echo PHP_EOL . '----------- 5. Поиск по сложному условию типа OR -----------------------' . PHP_EOL;

        $employees = Employee::where('first_name', 'like', 'John%')->orWhere('age', '>', 27)->get();

        foreach ($employees as $employee) {
            echo 'id: ' . $employee->id . ' -  name: ' . $employee->first_name . ' - age: ' . $employee->age . PHP_EOL;
        }

        echo PHP_EOL . '--- 6. Метод first() - возвращает первое вхождение по условию в виде МАССИВА и ОБЪЕКТА )) !!! ----' . PHP_EOL;

        $employee = Employee::where('first_name', 'like', 'John%')->orWhere('age', '>', 27)->first();
//        var_dump($employee);
        echo 'Массив: id: ' . $employee->id . ' -  name: ' . $employee->first_name . ' - age: ' . $employee->age .
            PHP_EOL;
        echo 'Объект: id: ' . $employee ['id'] . ' -  name: ' . $employee ['first_name'] . ' - age: ' . $employee ['age'] .
            PHP_EOL;
        // ---------------------------

        echo PHP_EOL . '-------------------------------------' . PHP_EOL;
        echo '--- 3.6 Сортировка и ограничение ----' . PHP_EOL;
        echo '--- Сортировка по возрасту ----' . PHP_EOL;
//        $employees = Employee::orderBy('age')->get(); // asc - по умолчанию
        $employees = Employee::orderBy('age', 'desc')->get();

        foreach ($employees as $employee) {
            echo 'id: ' . $employee->id . ' -  name: ' . $employee->first_name . ' - age: ' . $employee->age . PHP_EOL;
        }

        echo PHP_EOL . '--- Сортировка по возрасту + ограничение вывода 3-мя строками ----' . PHP_EOL;
        $employees = Employee::orderBy('age', 'desc')->limit(3)->get();

        foreach ($employees as $employee) {
            echo 'id: ' . $employee->id . ' -  name: ' . $employee->first_name . ' - age: ' . $employee->age . PHP_EOL;
        }

        echo PHP_EOL . '--- Сортировка по возрасту + ограничение вывода 3-мя строками + смещение на 2 строки ----' . PHP_EOL;
        $employees = Employee::orderBy('age', 'desc')->offset(2)->limit(3)->get();

        foreach ($employees as $employee) {
            echo 'id: ' . $employee->id . ' -  name: ' . $employee->first_name . ' - age: ' . $employee->age . PHP_EOL;
        }


        echo PHP_EOL . '--- Поиск по сложному условию типа OR + Сортировка по возрасту + ограничение вывода 3-мя строками + смещение на 2 строки ----' . PHP_EOL;
        $employees = Employee::where('first_name', 'like', 'John%')->orWhere('age', '>', 27)->orderBy('age')
            ->offset(2)->limit(3)->get();

        foreach ($employees as $employee) {
            echo 'id: ' . $employee->id . ' -  name: ' . $employee->first_name . ' - age: ' . $employee->age . PHP_EOL;
        }

        echo PHP_EOL . '-------------------------------------' . PHP_EOL;
        echo '--- 3.7 Группировка данных ----' . PHP_EOL;
        echo '--- Группировка по именам - groupBy(first_name) ----' . PHP_EOL;

        $employees = DB::table('employees') // Для работы с count() используем класс DB
            ->groupBy('first_name') // Группируем по полю first_name
        // Первый аргумент метода select() — сырой SQL-запрос, второй — значения параметров для прикрепления к запросу.
        // Обычно это значения для формирования условия WHERE.
        // Привязка параметров обеспечивает защиту от SQL-инъекций. Метод select()возвращает массив объектов stdClass.
            ->select( // Это «сырой» запрос (Raw Query) - как в SQL
                'first_name', // Выводим first_name
                DB::raw('count(*) as employee_total')) // и количество таких имен в таблице как employee_total
            // При группировке по к-л полю count() будет работать только с groupBy().
            // Без groupBy() можно вывести count() только на количество всех строк в таблице
            ->get();

        foreach ($employees as $employee) {
            echo 'Name: ' . $employee->first_name . ' - employee_total: ' . $employee->employee_total . PHP_EOL;
        }

        echo PHP_EOL . '--- Какие имена сотрудников вообще есть, т.е. унакальные - distinct() ----' . PHP_EOL;

        $employees = Employee::distinct()->orderBy('first_name', 'desc')->get('first_name');
        foreach ($employees as $employee) {
            echo 'Name: ' . $employee->first_name . PHP_EOL;
        }
        return 0;
    }
}
