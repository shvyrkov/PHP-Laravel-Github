<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel: Blade-директивы</title>
</head>
<body>
<h2>4.4 Blade-директивы</h2>
<h3 style="background-color: skyblue; width: 100%; height: 50px;">Users</h3>
@php
    $greenUser = 2;
@endphp
{{--Comment--}}
<table border="3">
    @foreach($userList as $key => $user)
        @if($key === $greenUser)
            <tr>
                <td>{{$key}}</td>
                <td style="background-color: green">{{$user}}</td>
            </tr>
        @elseif($key === 4)
            <tr>
                <td>{{$key}}</td>
                <td><b>{{$user}}</b></td>
            </tr>
        @else
            <tr>
                <td>{{$key}}</td>
                <td>{{$user}}</td>
            </tr>
        @endif
    @endforeach
</table>

</body>
</html>
