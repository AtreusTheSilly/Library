<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Publisher;

class PublisherController extends Controller
{
    public function index()
    {
        $publishers = Publisher::all();
        return view('admin.publishers.index', compact('publishers'), ['layout' => 'layouts.admin']);
    }

    public function create()
    {
        return view('admin.publishers.create', ['layout' => 'layouts.admin']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Publisher::create($request->all());

        return redirect()->route('admin.publishers.index')->with('success', 'Издатель добавлен.');
    }

    public function edit(Publisher $publisher)
    {
        return view('admin.publishers.edit', compact('publisher'), ['layout' => 'layouts.admin']);
    }

    public function update(Request $request, Publisher $publisher)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $publisher->update($request->all());

        return redirect()->route('admin.publishers.index')->with('success', 'Издатель обновлен.');
    }

    public function destroy(Publisher $publisher)
    {
        $publisher->delete();
        return redirect()->route('admin.publishers.index')->with('success', 'Издатель удален.');
    }
}
?>