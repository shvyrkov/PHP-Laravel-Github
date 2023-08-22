<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h1>5.7 Практическая работа</h1>
    <h3>User form</h3>

    <form name="employee-form" id="employee-form" method="post" action="{{url('store-form')}}">

        @csrf
        <div class="form-group">
            <label for="name">Имя</label>
            <input type="text" class="form-control" id="name" name="name" required="true">
        </div>
        <div class="form-group">
            <label for="surname">Фамилия</label>
            <input type="text" class="form-control" id="surname" name="surname" required="true">
        </div>
        <div class="form-group">
            <label for="position">Занимаемая должность</label>
            <input type="text" class="form-control" id="position" name="position" required="true">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required="true">
        </div>
        <div class="form-group">
            <label for="JSON_data">Адрес проживания (JSON_data)</label>
            <textarea class="form-control" id="JSON_data" name="JSON_data" rows="8" required="true">
            {
                "address": {
                    "street": "Tverskaya",
                    "suite": "Apt.888",
                    "city": "Moscow",
                    "zipcode": "123456",
                    "geo": {
                        "lat": "55.55",
                        "lng": "33.33"
                    }
                }
            }
            </textarea>
        </div>
        <br>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>
</html>
