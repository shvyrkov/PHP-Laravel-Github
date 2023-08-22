<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Логи</title>
    <style>
        td:nth-child(5), td:nth-child(6) {
            text-align: center;
        }

        table {
            position: absolute;
            border-spacing: 0;
            border-collapse: collapse;
            width: 70%;
            box-shadow: 0px 4px 100px rgb(255 255 255 / 25%);
        }

        td, th {
            padding: 10px;
            border: 1px solid #282828;
        }

        tr:nth-child(odd) {
            background-color: #C1B7B7;
        }
    </style>
</head>
<body>

@php
$db_server = '127.0.0.1';
//$db_server = 'localhost';
$db_user = 'mysql';
$db_password = 'mysql';
$db_name = 'skillbox_laravel_8_practise';

try {
    $db = new \PDO("mysql:host=$db_server;dbname=$db_name", $db_user, $db_password, array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT id, time, duration, ip, url, method, input FROM logs ORDER BY id DESC";

    $statement = $db->prepare($sql);

    $statement->execute();

    $result_array = $statement->fetchAll();
} catch (PDOException $e) {
    $error = "Ошибка при создании записи в базе данных: " . $e->getMessage();
}
@endphp

@if(isset($error))
    <h3 style="color: darkred">{{$error}}</h3>
@endif

@if(isset($result_array))
    <div class="table">
        <table>
            <tr>
                <th>id</th>
                <th>time</th>
                <th>duration</th>
                <th>ip</th>
                <th>url</th>
                <th>method</th>
                <th>input</th>
            </tr>
            @foreach($result_array as $result_row)
                <tr>
                    <td align="center">{{$result_row['id']}}</td>
                    <td align="center">{{$result_row['time']}}</td>
                    <td align="center">{{$result_row['duration']}}</td>
                    <td align="center">{{$result_row['ip']}}</td>
                    <td align="center">{{$result_row['url']}}</td>
                    <td align="center">{{$result_row['method']}}</td>
                    <td align="center">{{$result_row['input']}}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endif

@php
    $db = null;
@endphp

</body>
