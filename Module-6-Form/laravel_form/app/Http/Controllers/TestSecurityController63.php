<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * 6.3 Обеспечение безопасности формы
 */
class TestSecurityController63 extends Controller
{
    //
    public function show()
    {
        return view('test_csrf63');
    }

    public function post(Request $request)
    {
        echo 'test_name: ' . $request->input('test_name');
    }
}
