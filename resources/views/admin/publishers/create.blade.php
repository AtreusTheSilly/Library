@extends('layouts.app')

@section('content')
    <h1>Создать Издателя</h1>

    <form action="{{ route('admin.publishers.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Название</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
@endsection
