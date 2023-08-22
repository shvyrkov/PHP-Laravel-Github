<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel: Хелперы</title>
</head>
<body>
<h2>4.5 Хелперы. Работы с формами</h2>
<h3 style="background-color: skyblue; width: 100%; height: 50px;">Применение собственной директивы</h3>

@php
    $name = 'Petr';
//    echo $name;
@endphp

@headerUpperCase($name) {{-- Использование кастомной (т.е. своей) директивы - см.class BladeHelperServiceProvider--}}

</body>
</html>
