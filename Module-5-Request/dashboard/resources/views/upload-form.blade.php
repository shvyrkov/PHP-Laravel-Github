<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Upload files</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
<h1>5.5 Передача файлов в запросе</h1>
<h3>Загрузка файлов по одному</h3>
<form name="file-upload" enctype="multipart/form-data" method="post" action="{{route('upload_file')}}">
    <div class="form-group">
        <label for="exampleFormControlFile1">File to upload</label>
        <input type="file" name="upload-photo" class="form-control-file" id="exampleFormControlFile1">

        <button type="submit" class="btn btn-primary" >Submit</button>
        @csrf
    </div>
</form>
<h3>Загрузка нескольких файлов 1</h3>
<form name="file-upload" enctype="multipart/form-data" method="post" action="{{route('upload_file')}}">
    <div class="form-group">
        <label for="Upload_1">File to upload</label>
        <input type="file" name="upload_photos[]" class="form-control-file" id="Upload_1">
        <input type="file" name="upload_photos[]" class="form-control-file" id="Upload_1">
        <input type="file" name="upload_photos[]" class="form-control-file" id="Upload_1">

        <button type="submit" class="btn btn-primary" >Upload 1</button>
        @csrf
    </div>
</form>
<h3>Загрузка нескольких файлов 2</h3>
<form name="file-upload" enctype="multipart/form-data" method="post" action="{{route('upload_file')}}">
    <div class="form-group">
        <label for="Upload_2">File to upload</label>
        <input type="file" name="upload_photos[]" class="form-control-file" id="Upload_2" accept="image/*" multiple>

        <button type="submit" class="btn btn-primary" >Upload 2</button>
        @csrf
    </div>
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
