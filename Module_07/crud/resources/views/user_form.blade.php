@extends('layouts.default')

@section('user_form')
    <div class="col-6 add-users__form-wrapper">
        <h3 class="form_title">Форма добавления пользователя.</h3>
        <form name="add-new-user" id="add-new-user" method="post" action="{{url('user-store')}}">
            @csrf
            <div class="form-section">
                <label for="name" @error('name') class="invalid" @enderror>Имя:</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <div class="form-section">
                <label for="surname" @error('surname') class="invalid" @enderror>Фамилия: </label>
                <input type="text" id="surname" name="surname" class="form-control" required>
            </div>
            <div class="form-section">
                <label for="email" @error('email') class="invalid" @enderror>E-mail: </label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <br><br>
            <button type="submit" class="btn btn-primary">Добавить пользователя</button>
        </form>
        {{--Использование переменной $errors для вывода ошибок валидации--}}
        @if($errors->any())
            <hr>
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li class="invalid"> {{$error}} </li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
@stop
