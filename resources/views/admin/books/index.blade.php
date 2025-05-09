@extends('layouts.app')

@section('content')
    <h1>Книги</h1>
    <a href="{{ route('admin.books.create') }}" class="btn btn-success mb-3">Добавить Книгу</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Название</th>
                <th>Автор</th>
                <th>Жанр</th>
                <th>Издатель</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $book->id }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author->name }}</td>
                    <td>{{ $book->genre->name }}</td>
                    <td>{{ $book->publisher->name }}</td>
                    <td>
                        <a href="{{ route('admin.books.edit', $book->id) }}" class="btn btn-warning btn-sm">Редактировать</a>
                        <form action="{{ route('admin.books.destroy', $book->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Удалить книгу?')">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
