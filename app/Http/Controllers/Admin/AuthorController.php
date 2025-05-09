<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();
        return view('admin.authors.index', compact('authors'), ['layout' => 'layouts.admin']);
    }

    public function create()
    {
        return view('admin.authors.create', ['layout' => 'layouts.admin']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Author::create($request->all());

        return redirect()->route('admin.authors.index')->with('success', 'Автор добавлен.');
    }

    public function edit(Author $author)
    {
        return view('admin.authors.edit', compact('author'), ['layout' => 'layouts.admin']);
    }

    public function update(Request $request, Author $author)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $author->update($request->all());

        return redirect()->route('admin.authors.index')->with('success', 'Автор обновлен.');
    }

    public function destroy(Author $author)
    {
        $author->delete();
        return redirect()->route('admin.authors.index')->with('success', 'Автор удален.');
    }
}
?>