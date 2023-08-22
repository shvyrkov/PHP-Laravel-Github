<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel form validation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <style>
        .invalid {
            color: red;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <h1> 6.4 Валидация формы</h1>
        <hr>
        <div class="col-6">
            <form name="validation" method="post" action="{{route('post_validation_form')}}">
                @csrf
                <div class="form-group">
                    {{--Использование директивы @error для вывода ошибок валидации--}}
                    <label for="name" @error('fullname') class="invalid" @enderror>
                        Name:
                        @error('fullname') <b>{{$message}}</b> @enderror
                    </label>
                    <input type="text" name="fullname" class="form-control" id="name"
                        {{--Валидация в браузере--}}
                        {{--required--}}
                    >
                </div>
                <div class="form-group">
                    <label for="password" @error('password') class="invalid" @enderror>Password: </label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm password: </label>
                    <input type="password" name="confirm_password" class="form-control" id="confirm_password">
                </div>

                <br><br>
                {{--            <input type="submit" class="btn btn-primary" value="Отправить">--}}
                <button type="submit" class="btn btn-primary">Create user</button>

            </form>
{{--Использование переменной $errors для вывода ошибок валидации--}}
            @foreach($errors->all() as $error)
                <b class="invalid"> {{$error}} </b><br>
            @endforeach
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>
</html>
