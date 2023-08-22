<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel: Component testing</title>
</head>
<body>
<h2>4.3 Вложенные шаблоны</h2>
<h3 style="background-color: lawngreen; width: 100%; height: 50px;">About page template</h3>
@php
    $message = 'Test message variable';
@endphp
<x-header text="This is About page - data from About-template - simple string" :message="$message">
    <x-slot name="shape">
        <div style="background-color: red; width: 150px; height: 50px; display: block">Это СЛОТ shape</div>
    </x-slot>
    <x-slot name="line">
        <p>Это СЛОТ line</p>
    </x-slot>

</x-header>

</body>
</html>
