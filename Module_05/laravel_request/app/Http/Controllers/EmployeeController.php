<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public $users = [
        ['name' => 'Denis', 'surname' => 'Ivanov', 'position' => 'admin', 'email' => 'den@mail.com'],
        ['name' => 'Viktor', 'surname' => 'Petrov', 'position' => 'programmer', 'email' => 'vik@mail.com'],
        ['name' => 'Yuri', 'surname' => 'Gagarin', 'position' => 'cosmonaut', 'email' => 'yu@mail.com'],
    ];

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('get-employee-data');
    }

    /**
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $name = $request->input('name');
        $surname = $request->input('surname');
        $position = $request->input('position');
        $email = $request->input('email');

        $jsonData = json_decode($request->input('JSON_data'));

        $this->users[] = [
            'name' => $name,
            'surname' => $surname,
            'position' => $position,
            'email' => $email,
            'address' => self::getAddress($jsonData) // Добавляем адрес из JSON
        ];

        self::printData($request, $jsonData);
    }

    /**
     * @param Request $request
     * @param $id
     * @return void
     */
    public function update(Request $request, $id)
    {
        $name = $request->input('name');
        $surname = $request->input('surname');
        $position = $request->input('position');
        $email = $request->input('email');

        $jsonData = json_decode($request->input('JSON_data'));

        $this->users[$id] = [
            'name' => $name,
            'surname' => $surname,
            'position' => $position,
            'email' => $email,
            'address' => self::getAddress($jsonData) // Добавляем адрес из JSON
        ];

        echo '<b>User #' . $id . ' has been updated: </b><br>';
        self::printData($request, $jsonData);
    }

    /**
     * @param Request $request
     * @return void
     */
    protected function getPath(Request $request)
    {
        echo $request->path() . PHP_EOL;
    }

    /**
     * @param Request $request
     * @return void
     */
    protected function getUrl(Request $request)
    {
        echo $request->url() . PHP_EOL;
    }

    /**
     * @param Request $request
     * @param $jsonData
     * @return void
     */
    protected function printData(Request $request, $jsonData)
    {
        echo '<pre><b>Users: </b><br>';
        print_r($this->users);
        echo '<hr><b>JSON_data: </b><br>';
        print_r($jsonData);
        echo '<hr><b>Path: </b><br>';
        $this->getPath($request);
        echo '<hr><b>URL:</b> <br>';
        $this->getUrl($request);
        echo '</pre>';
    }

    /**
     * @param $jsonData
     * @return array
     */
    protected function getAddress($jsonData): array
    {
// 11 Создайте произвольное количество новых php переменных, в которые поместите отдельные поля из пришедших данных в формате JSON.
        $address = $jsonData->address;
        $geo = $address->geo;

        return [
            'street' => $address->street,
            'suite' => $address->suite,
            'city' => $address->city,
            'zipcode' => $address->zipcode,
            'geo' => [
                'lat' => $geo->lat,
                'lng' => $geo->lng
            ]
        ];
    }
}
