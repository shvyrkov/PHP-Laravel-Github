<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF; // См. config/app.php - aliases

class PdfGeneratorController extends Controller
{
    public function index($id = 0) // возвращать новый PDF-файл
    {
//        $data = [
//            'id' => $id,
//            'name' => 'John',
//            'surname' => 'Shvarzcoph',
//            'email' => 'john@mail.com',
//        ];

        $user = User::find($id);

        $data = [
            'name' => $user['name'] ?? 'No such user name!',
            'surname' => $user['surname'] ?? 'No such user surname!',
            'email' => $user['email'] ?? 'No such user e-mail!',
        ];

        $pdf = PDF::loadView('resume', $data);

        return $pdf->stream('resume.pdf');
    }
}
