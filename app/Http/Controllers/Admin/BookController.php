<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;
use App\Models\Genre;
use App\Models\Publisher;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with(['author', 'genre', 'publisher'])->get();
        return view('admin.books.index', compact('books'), ['layout' => 'layouts.admin']);
    }

    public function create()
    {
        $authors = Author::all();
        $genres = Genre::all();
        $publishers = Publisher::all();
        return view('admin.books.create', compact('authors', 'genres', 'publishers', ['layout' => 'layouts.admin']));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author_id' => 'required|exists:authors,id',
            'genre_id' => 'required|exists:genres,id',
            'publisher_id' => 'required|exists:publishers,id',
        ]);

        Book::create($request->all());

        return redirect()->route('admin.books.index')->with('success', 'Книга добавлена.');
    }

    public function edit(Book $book)
    {
        $authors = Author::all();
        $genres = Genre::all();
        $publishers = Publisher::all();
        return view('admin.books.edit', compact('book', 'authors', 'genres', 'publishers'), ['layout' => 'layouts.admin']);
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author_id' => 'required|exists:authors,id',
            'genre_id' => 'required|exists:genres,id',
            'publisher_id' => 'required|exists:publishers,id',
        ]);

        $book->update($request->all());

        return redirect()->route('admin.books.index')->with('success', 'Книга обновлена.');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('admin.books.index')->with('success', 'Книга удалена.');
    }
}
?>