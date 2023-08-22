<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel form binding</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
        <h1>6.2 Биндинг данных формы</h1>
        <hr>
        <div class="col-6">
            <form name="employee" method="post" action="{{route('store_employee')}}">
                @csrf
                <div class="form-group">
                    <label for="first_name">First name: </label>
                    <input type="text" name="first_name" class="form-control" id="first_name"
                           value="@if($employee) {{$employee->first_name}} @endif">
                </div>
                <div class="form-group">
                    <label for="last_name">Last name: </label>
                    <input type="text" name="last_name" class="form-control" id="last_name"
                           value="@if($employee) {{$employee->last_name}} @endif">
                </div>

                {{--                <div class="form-group">--}}
                {{--                    <label for="department">Department:</label>--}}
                {{--                    <select class="form-control" name="department" id="department">--}}
                {{--                        <option value="finance">Finance</option>--}}
                {{--                        <option value="it">IT</option>--}}
                {{--                        <option value="internal service">Internal service</option>--}}
                {{--                    </select>--}}
                {{--                </div>--}}

                <label for="department">Department:</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="department[]" value="finance" id="finance"
                           @if($employee && in_array('finance', unserialize($employee->department))) checked @endif>
                    <label class="form-check-label" for="finance">
                        Finance
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="department[]" value="it" id="it"
                           @if($employee && in_array('it', unserialize($employee->department))) checked @endif>
                    <label class="form-check-label" for="it">
                        IT
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="department[]" value="internal service" id="internal"
                           @if($employee && in_array('internal service', unserialize($employee->department))) checked @endif>
                    <label class="form-check-label" for="internal">
                        Internal service
                    </label>
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
