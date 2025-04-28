@extends('layouts.app')

@section('content')
    <h1>Редактировать Автора</h1>

    <form action="{{ route('authors.update', $author->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="name" class="form-label">Имя</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $author->name) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Обновить</button>
    </form>
@endsection
