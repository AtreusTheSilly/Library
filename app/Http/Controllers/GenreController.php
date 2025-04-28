<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Genre;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::all();
        return view('genres.index', compact('genres'));
    }

    public function create()
    {
        return view('genres.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Genre::create($request->all());

        return redirect()->route('genres.index')->with('success', 'Жанр добавлен.');
    }

    public function edit(Genre $Genre)
    {
        return view('genres.edit', compact('Genre'));
    }

    public function update(Request $request, Genre $Genre)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $Genre->update($request->all());

        return redirect()->route('genres.index')->with('success', 'Жанр обновлён.');
    }

    public function destroy(Genre $Genre)
    {
        $Genre->delete();
        return redirect()->route('genres.index')->with('success', 'Жанр удален.');
    }
}
