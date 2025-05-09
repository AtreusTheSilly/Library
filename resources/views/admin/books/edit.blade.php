@extends('layouts.app')

@section('content')
    <h1>Редактировать Книгу</h1>

    <form action="{{ route('admin.books.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Название</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $book->title) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Автор</label>
            <select name="author_id" class="form-control" required>
                @foreach($authors as $author)
                    <option value="{{ $author->id }}" @if($author->id == $book->author_id) selected @endif>{{ $author->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Жанр</label>
            <select name="genre_id" class="form-control" required>
                @foreach($genres as $genre)
                    <option value="{{ $genre->id }}" @if($genre->id == $book->genre_id) selected @endif>{{ $genre->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Издатель</label>
            <select name="publisher_id" class="form-control" required>
                @foreach($publishers as $publisher)
                    <option value="{{ $publisher->id }}" @if($publisher->id == $book->publisher_id) selected @endif>{{ $publisher->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Обновить</button>
    </form>
@endsection