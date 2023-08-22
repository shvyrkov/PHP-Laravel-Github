<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel form security</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
        <h1>6.3 Обеспечение безопасности формы</h1>
        <hr>
        <div class="col-6">
            <form name="test_csrf" method="post" action="{{route('show_security_form')}}">
                @csrf
                <div class="form-group">
                    <label for="name">Name: </label>
                    <input type="text" name="test_name" class="form-control" id="name">
                </div>

                <br><br>
                {{--            <input type="submit" class="btn btn-primary" value="Отправить">--}}
                <button type="submit" class="btn btn-primary">Send</button>

            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>
</html>
