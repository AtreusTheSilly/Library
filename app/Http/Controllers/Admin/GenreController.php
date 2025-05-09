<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Genre;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::all();
        return view('admin.genres.index', compact('genres'), ['layout' => 'layouts.admin']);
    }

    public function create()
    {
        return view('admin.genres.create', ['layout' => 'layouts.admin']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Genre::create($request->all());

        return redirect()->route('admin.genres.index')->with('success', 'Жанр добавлен.');
    }

    public function edit(Genre $Genre)
    {
        return view('admin.genres.edit', compact('Genre'), ['layout' => 'layouts.admin']);
    }

    public function update(Request $request, Genre $Genre)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $Genre->update($request->all());

        return redirect()->route('admin.genres.index')->with('success', 'Жанр обновлён.');
    }

    public function destroy(Genre $Genre)
    {
        $Genre->delete();
        return redirect()->route('admin.genres.index')->with('success', 'Жанр удален.');
    }
}
?>