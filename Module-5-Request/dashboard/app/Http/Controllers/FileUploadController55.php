<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * 5.5 Передача файлов в запросе
 */
class FileUploadController55 extends Controller
{
    /**
     * Вывод формы на экран
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showForm()
    {
        return view('upload-form');
    }

    /**
     * Загрузка файла на сервер в постоянное хранилище
     * @param Request $request
     * @return void
     */
    public function fileUpload(Request $request)
    {
        if ($request->hasFile('upload-photo')) {
            $file = $request->file('upload-photo'); // <input type="file" name="upload-photo"
//            var_dump($file); // object(Illuminate\Http\UploadedFile)
            echo '<b>Temp path: </b>' . $file->path() . '<br>'; // Временное хранилище -
            // C:\OpenServer\userdata\php_upload\php1D0.tmp
            // php1D0.tmp - временное имя файла БЕЗ ОРИГИНАЛЬНОГО РАСШИРЕНИЯ !
            echo '<b>Original file name: </b>' . $file->getClientOriginalName() . '<br>'; // Имя загружаемого файла
            echo '<b>Original file extention: </b>' . $file->getClientOriginalExtension() . '<br>'; // Расширение
            // загружаемого файла

//            $file->store('images'); // Сохранение файла под ВРЕМЕННЫМ именем в папку /storage/app/images
//            $file->storeAs('images', $file->getClientOriginalName()); // Сохранение файла под своим именем в папку
            // /storage/app/images, которая создастся автоматически
        } else {
            echo 'No file uploaded';
        }

        if ($request->hasFile('upload_photos')) {
// Загрузка НЕСКОЛЬКИХ файлов
            foreach ($request->upload_photos as $photo) {
                var_dump($photo);
            }
        } else {
            echo 'No files uploaded';
        }

    }
}
