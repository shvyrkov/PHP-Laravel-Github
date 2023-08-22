<?php

namespace App\Http\Controllers;

use App\Forms\EmployeeForm;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;

/**
 * 6.5 Конструктор форм Laravel
 */
class FormBuilderTestController65 extends Controller
{
    public function show(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(EmployeeForm::class, // Задаем класс формы
            [ // Пар-ры формы
                'method' => 'POST',
                'url' => route('post_builder_test')
            ]);

        return view('show_form65', compact('form')); // В шаблон будет передана переменная $form
    }

    public function post(Request $request)
    {
        var_dump($request);
    }
}
