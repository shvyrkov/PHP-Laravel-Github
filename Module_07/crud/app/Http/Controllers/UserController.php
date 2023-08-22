<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Получение всех пользователей из БД
     * @return User[]|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Получение одного пользователя через id
     *
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function get(Request $request, $id)
    {
        return User::where('id', $id)->first();
    }

    /**
     * Вывод формы для создания пользователя
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('user_form');
    }

    /**
     * Запись нового пользователя в базу данных
     *
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50', // Поле обязательное, максимальное количество символов — 50
            'surname' => 'required|max:50', // Поле обязательное, максимальное количество символов — 50
            'email' => 'required|unique:users|email', // Поле обязательное, должно соответствовать виду example@mail.com.
        ]);

        return User::create($request->all());
    }
}
