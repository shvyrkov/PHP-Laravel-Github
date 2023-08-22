<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BookController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('form');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $validatedData = $request->validate([ // Валидации полей
            'title' => 'required|unique:books|max:255',
            'author' => 'required|max:100',
            'year_of_publication' => 'required|numeric|digits:4|lte:' . (int) date("Y"),
            'genre' => 'required',
        ]);

        $book = Book::create($validatedData);

        return response()->json(['Book has been successfully validated and saved.', $book]);
    }
}
