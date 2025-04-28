@extends('layouts.app')

@section('content')
    <h1>Редактировать жанр</h1>

    <form action="{{ route('genres.update', $genre->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="name" class="form-label">Название</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $genre->name) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Обновить</button>
    </form>
@endsection
