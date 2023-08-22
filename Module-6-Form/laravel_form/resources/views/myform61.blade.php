<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
        <h1>6.1 Элементы управления формой</h1>
        <hr>
        <div class="col-6">
            <form action="{{route('post_form')}}" method="post" name="my_name">
                @csrf
                <div class="form-group">
                    <label for="my_name">Name: </label>
                    <input type="text" name="my_name" class="form-control" id="my_name">

                    <label for="password">Password: </label>
                    <input type="password" name="password" class="form-control" id="password">

                    <label for="age">Age: </label>
                    <input type="number" name="age" disabled value="25" class="form-control" id="age">

                    <label for="hidden_field">Hidden field: </label>
                    <input type="hidden" name="hidden_field" value="32" class="form-control" id="hidden_field">

                    <h4>Gender:</h4>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="male" value="male" checked>
                        <label class="form-check-label" for="male">
                            Male
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                        <label class="form-check-label" for="female">
                            Female
                        </label>
                    </div>

                    <h4>Categories:</h4>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="category[]" value="notebooks"
                               id="notebooks">
                        <label class="form-check-label" for="notebooks">
                            Notebooks
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="category[]" value="monitors"
                               id="monitors">
                        <label class="form-check-label" for="monitors">
                            Monitors
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="category[]" value="keyboards"
                               id="keyboards">
                        <label class="form-check-label" for="keyboards">
                            Keyboards
                        </label>
                    </div>
                    <br><br>
                    {{--            <input type="submit" class="btn btn-primary" value="Отправить">--}}
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>
</html>
