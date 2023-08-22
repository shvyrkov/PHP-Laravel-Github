<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * 6.1 Элементы управления формой
 */
class TestFormController61 extends Controller
{
    /**
     * Вывод формы на экран
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function displayForm()
    {
        return view('/myform61');
    }

    /**
     * Обработка формы
     * @param Request $request
     * @return void
     */
    public function postForm(Request $request)
    {
        echo 'input type="text": ' . $request->input('my_name') . '<br>';
        echo 'input type="password": ' . $request->input('password') . '<br>';
        echo 'input type="number" disabled value="25": ' . $request->input('age') . '<br>';
        echo 'input type="hidden" value="32": ' . $request->input('hidden_field') . '<br>';
        echo 'type="radio" name="gender": ' . $request->input('gender') . '<br>';
        echo 'type="checkbox" name="category[]": <br>';
        print_r($request->input('category'));
    }
}
