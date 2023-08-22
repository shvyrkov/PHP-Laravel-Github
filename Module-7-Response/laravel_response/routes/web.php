<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Http\Response;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home'); // Задание имени маршруту, далее - вызов - route('home')

// ---------- 7.1 Класс Response в Laravel - примеры без контроллера ----------
// Ответ в виде строки
Route::get('/test_url', function () {
    return 'Test'; // Laravel автоматически преобразует то что в return в Тело Ответа и добавляет необходимые Заголовки.
}); // По умолчанию: код ответа - 200, cookie - laravel_session, XSRF-TOKEN

// Ответ в виде объекта класса Response
Route::get('/test_response_object', function () {
    // Задаем только контент и код ответа
//    return new Response('Test content', 200);
//    return new Response('Ресурс не доступен', 403); // 403 - ресурс не доступен клиенту - выведет: Ресурс не доступен
//    return new Response(null, 403); // 403 - ресурс не доступен клиенту и ничего в теле ответа -
    return new Response('Test header', 200, ['My HEADER 1' => 'Test header 1']); // 403 - ресурс не доступен клиенту и
    // ничего в теле ответа -
    // Выведет: Access to localhost was denied...
});

// Использование функции-хелпера response() - также создает объект Response для ответа с теми же параметрами.
Route::get('/test_response_helper', function () {
    return response('Test response helper', 200)
        ->header('My HEADER 2', 'Test header 2')
        ->header('Content-Type', 'application/json'); // Передача заголовка через header()
//    return response('Test response helper', 200, ['My HEADER 3' => 'Test header 3']); // То же самое
});

// Redirect
Route::get('/test_redirect', function () {
//   return response('Redirect content', 302);
//   return redirect()->route('home'); // редирект на '/' - см.выше
//   return redirect('/'); // то же самое - редирект на '/'
    return redirect(null, 301)->away('https://skillbox.ru/'); // Постоянный (код 301) редирект на внешний ресурс (away())
});

// 7.2 ---------- Установка HTTP-заголовков и cookie -----------
Route::get('/test_cookie', function () {
    // Вариант задания куки через хелпер
    $cookie = cookie('my_test_cookie-0', 'test cookie content 0', 15);

    // Удаление куки до формирования ответа
//    \Illuminate\Support\Facades\Cookie::expire('my_test_cookie-1');

    return response('My first cookie') // Варианты задания и передачи куки и заголовков
    ->cookie($cookie)
        ->cookie('my_test_cookie-1', 'test cookie content 1', 15) // Время жизни куки - 15 мин.
//        ->cookie('my_test_cookie-2', 'test cookie content 2', 5)
        ->cookie('my_test_cookie-2', 'test cookie content 2', -1) // Альтернативное удаление куки - отрицательное
        // время жизни - менее наглядно
//        ->header('Set-Cookie','my_test_cookie-3=130') // Альтернативное задание куки (не лучшее)
        ->header('X-HEADER-1', 'It works 1!')
        ->header('X-HEADER-2', 'It works 2!')
        ->header('X-HEADER-3', 'It works 3!')
        // Альтернативное задание заголовков
        ->withHeaders([
            'X-HEADER-11' => 'It works 11!',
            'X-HEADER-12' => 'It works 12!',
            'X-HEADER-13' => 'It works 13!',
        ])
        // Удаление cookie
        ->withoutCookie('my_test_cookie-3');
});

// ---------- 7.3 Сессии в Laravel ----------
Route::get('/counter', function () { // Счётчик посещения страницы
    $counterValue = session('counter', 0); // Получаем из сессии значение счётчика, если его нет, то = 0
    $counterValue++; // Добавляем посещение страницы
    session(['counter' => $counterValue]); // Записываем в сессию с новым значением

    return 'Ok - ' . session('counter', 0);
});

Route::get('/result_counter', function () { // Вывод значения счётчика
    return session('counter', 0); // Запрос другой, а значение счётчика сохраняется - пример работы сессии
});

Route::get('/get_session_data', function () { // Вывод всех данных сессии
    echo '<pre>';
    var_dump(session()->all()); // Выведет все пары ключ=>значение
    echo '</pre>';
});

Route::get('/delete_counter', function () { // Сброс значений счётчика
    echo '<pre>Befor: <br>';
    var_dump(session()->all()); // Выведет все пары ключ=>значение
    echo '<hr>';

    if (session()->has('counter')) { // Если счётчик имеет значение
        session()->forget('counter'); // Удаляем счётчик
    }

    echo 'After: <br>';
    var_dump(session()->all()); // Выведет все пары ключ=>значение
    echo '</pre>';
});

// ---------- 7.4 Особенности организации REST API в Laravel ----------
Route::get('/book/{id}?', function () { // Просмотр книги по id
    $book = session()->get('list_of_books');

});

Route::get('/book', function () {
//Route::get('/list_of_books', function () {
    // Создание переменной сессии вручную - для начала работы.
    // Далее надо комментировать при тестировании добавления и удаления книги.
//    session()->put(
//        'list_of_books', // 'list_of_books' - переменная в SESSION
//        serialize([ // Данные хранятся в виде строки: $_SESSION['list_of_books'] = data
//            ['author' => 'Lev Tolstoi', 'book' => 'War and peace'],
//            ['author' => 'Pelevin', 'book' => 'Generation P']
//        ])
//    );

    $listOfBooks = session()->get('list_of_books', ''); // Список с книгами хранится в сессии.
//    var_dump($listOfBooks); // string

    return response()->json([
        'status' => 'received',
//        'list_of_books' => $listOfBooks ?? 'The list is empty' // Для работы с массивом его
        'list_of_books' => $listOfBooks ? unserialize($listOfBooks) : 'The list is empty' // Для работы с массивом его
        // надо десериализовать
    ]);

});

// Для этого рута добавляем исключение в VerifyCsrfToken.php - '/book', т.к. post требует @csrf
Route::post('/book', function (\Illuminate\Http\Request $request) { // Добавить книгу в список
    $listOfBooks = session()->get('list_of_books', '');

    $listOfBooks = $listOfBooks ? unserialize($listOfBooks) : []; // Переводим в массив

    // Добавляем новую книгу из запроса в существующий список
    $listOfBooks[] = ['author' => $request->get('author'), 'title' => $request->get('title')];

    session()->put('list_of_books', serialize($listOfBooks)); // Отправляем список в переменную сессии в виде строки

    return response()->json([
        'status' => 'saved', // Меняем статус
        'list_of_books' => $listOfBooks // Здесь $listOfBooks - массив
    ]);
});

// Для этого рута добавляем исключение в VerifyCsrfToken.php - '/book/*', т.к. delete требует @csrf
Route::delete('/book/{id}', function ($id) { // Добавить книгу в список
    $listOfBooks = session()->get('list_of_books', '');

    $listOfBooks = $listOfBooks ? unserialize($listOfBooks) : []; // Переводим в массив

    if (array_key_exists($id, $listOfBooks)) { // Если книга с таким индексом есть
        unset($listOfBooks[$id]); // Удаляем книгу из массива-списка
    }

    session()->put('list_of_books', serialize($listOfBooks)); // Отправляем список в переменную сессии в виде строки

    return response()->json([
        'status' => 'deleted', // Меняем статус
        'list_of_books' => $listOfBooks // Здесь $listOfBooks - массив
    ]);
});

// ------------------- 7.5 Ответ сервера с файлом ----------------------
Route::get('/file_download', function () { // Загрузка файла клиенту из хранилища
    return response()->download(base_path() . '/resources/test_75.txt', 'my_test_75.txt');
    // base_path() - выдаст папку проекта
    // Метод download() добавляет заголовок 'Content-Disposition : attachment; filename=my_test_75.txt', где указан
    // файл для загрузки
});

Route::get('/file_show', function () { // Вывод файла в браузер без загрузки клиенту
    return response()->file(base_path() . '/resources/test_75.txt');
});

Route::get('/file_stream_download', function () { // Потоковая загрузка файла клиенту без сохранениия на сервере
//    return response()->file(base_path() . '/resources/test_75.txt'); // Test

    return response()->streamDownload(function () {
        echo file_get_contents('https://google.com'); // Скачаем содержимое страницы google.com
    }, 'google_75.html'); // и загрузим его клиенту в файл 'google_75.html' без сохранения на сервере.
});
