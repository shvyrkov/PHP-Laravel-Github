<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

/**
 * 6.4 Валидация формы
 */
class TestValidationController64 extends Controller
{
    public function show()
    {
        return view('employee_validation64');
    }

    public function post(Request $request)
    {
// ------- 1-й способ валидации и вывода ошибок ------------------
//        try {
//            $validated = $request->validate([ // Валидации полей
//                'fullname' => 'required|min:3' // Правила валидации
//            ]);
//        } catch (ValidationException $e) {
//            print_r($e->errors());
//            die($e->getMessage());
//        }
//
//        var_dump($validated);

// ------- 2-й способ валидации и вывода ошибок - Использование переменной $errors в шаблоне---------------
        $validated = $request->validate([ // Валидации полей
                'fullname' => 'required|min:3', // Правила валидации
                'password' => 'required|min:5' // Правила валидации
            ]);

        var_dump($validated);
    }
}
