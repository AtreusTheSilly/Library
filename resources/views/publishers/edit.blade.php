@extends('layouts.app')

@section('content')
    <h1>Редактировать издателя</h1>

    <form action="{{ route('publishers.update', $publisher->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="name" class="form-label">Название</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $publisher->name) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Обновить</button>
    </form>
@endsection
