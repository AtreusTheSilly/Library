<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;

class LibraryController extends Controller
{
    public function index()
    {
        $books = Book::with(['author', 'genre', 'publisher'])->get();
        return view('user.index', compact('books'), ['layout' => 'layouts.user']);
    }
}
?>