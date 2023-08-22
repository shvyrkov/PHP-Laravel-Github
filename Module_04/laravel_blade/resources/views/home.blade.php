@extends('layouts.default')

@section('content')
    <h2 style="background-color: skyblue; width: 100%; height: 50px;">This is content of Home page</h2>

    @if($age >= 18)
        {{-- Если значение age для страницы home больше 18 лет, --}}
        <p style="background-color: limegreen; width: 100%; height: 50px;">Welcome to Home page</p>
    @else
        <p style="background-color: indianred; width: 100%; height: 50px;">You are too young to be here!</p>
    @endif
@stop
