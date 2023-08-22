@extends('layouts.default')

@section('form')
    <div class="col-6 add-books__form-wrapper">
        <h3 class="form_title">Add a book to the catalog</h3>
        <form name="add-new-book" id="add-new-book" method="post" action="{{url('store')}}">
            @csrf
            <div class="form-section">
                <label for="title" @error('title') class="invalid" @enderror>Title:</label>
                <input type="text" id="title" name="title" class="form-control" required>
            </div>
            <div class="form-section">
                <label for="author" @error('author') class="invalid" @enderror>Author: </label>
                <input type="text" id="author" name="author" class="form-control" required>
            </div>
            <div class="form-section">
                <label for="year_of_publication" @error('year_of_publication') class="invalid" @enderror>Year of
                    publication: </label>
                <input type="number" id="year_of_publication" name="year_of_publication" class="form-control" required>
            </div>
            <div class="form-section">
                <label for="genre">Choose Genre: </label>
                <select name="genre" id="genre">
                    <option value="fantasy">Fantasy</option>
                    <option value="sci-fi">Science fiction</option>
                    <option value="mystery">Mystery</option>
                    <option value="drama">Drama</option>
                </select>
            </div>
            <br><br>
            <button type="submit" class="btn btn-primary">Submit</button>
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
