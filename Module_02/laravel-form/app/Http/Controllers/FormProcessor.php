<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Контроллер для вывода формы на страницу и её обработки.
 */
class FormProcessor extends Controller
{
    /**
     * Вывод в браузер формы для заполнения.
     */
    public function index()
    {
        return view('userForm');
    }

    /**
     * Метод принимает поля формы и отправляет ответ в виде JSON-объекта, содержащего значения полей формы (имя, фамилия, email).
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse
     */
//    public function store(Request $request): \Illuminate\Http\JsonResponse
    public function store(Request $request)
    {

        // Вариант 1
//        return response()->json([
//            'name' => $request->first_name,
//            'surname' => $request->last_name,
//            'email' => $request->email
//        ]);

        // Вариант 2
        return view('userWelcome', [
            'name' => $request->first_name,
            'surname' => $request->last_name,
            'email' => $request->email
        ]);
    }
}
