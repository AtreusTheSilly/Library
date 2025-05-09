@extends('layouts.app')

@section('content')
    <h1>Издатели</h1>
    <a href="{{ route('admin.publishers.create') }}" class="btn btn-success mb-3">Добавить Издателя</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Название</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($publishers as $publisher)
                <tr>
                    <td>{{ $publisher->id }}</td>
                    <td>{{ $publisher->name }}</td>
                    <td>
                        <a href="{{ route('admin.publishers.edit', $publisher->id) }}" class="btn btn-warning btn-sm">Редактировать</a>
                        <form action="{{ route('admin.publishers.destroy', $publisher->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Удалить издателя?')">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
