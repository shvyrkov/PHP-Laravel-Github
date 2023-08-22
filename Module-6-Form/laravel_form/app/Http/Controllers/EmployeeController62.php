<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\Redirect;

/**
 * 6.2 Биндинг данных формы
 */
class EmployeeController62 extends Controller
{
    // Вывод формы на экран
    public function show($id = null)
    {
//        if ($id) {
//            $employee = Employee::where('id', $id)->first();
//        } else {
//            $employee = null;
//        }

//        return view('employee62', ['employee' => $employee]);
        // ИЛИ
        return view('employee62', ['employee' => $id ? Employee::where('id', $id)->first() : null]);
    }

    // Обработка формы
    public function store(Request $request)
    {
//        var_dump($request->all()); // Вывод всех данных формы.

// 1-й способ биндинга - назначить вручную каждому св-ву Модели соответствующее значение из формы.
//        $employee = new Employee(); // Создаем новый объект Модели, т.е. будущую запись в БД.
//
//        $employee->first_name = $request->input('first_name');
//        $employee->last_name = $request->input('last_name');
//        $employee->department = $request->input('department');

// 2-й способ биндинга - передать в конструктор Модели весь запрос, а в БД пойдут только те поля, которые указаны в $fillable
        $employee = new Employee($request->all());

        // Перед сохранением в БД переопределим поле с массивом в строку
        $employee->department = serialize($request->input('department'));

        $employee->save(); // Запись в БД - метод класса Model - Eloquent отправляет запрос серверу БД, а тот уже
        // записывает на диск.

        // После добавления нового работника переходим обратно в форму по названию маршрута, но уже с данными этого
        // работника, переданными через его id - см. метод show($id)
        return Redirect::route('show_employee', ['id' => $employee->id]);
    }
}
