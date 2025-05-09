<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\Admin\AuthorController as AdminAuthorController;
use App\Http\Controllers\Admin\BookController as AdminBookController;
use App\Http\Controllers\Admin\GenreController as AdminGenreController;
use App\Http\Controllers\Admin\PublisherController as AdminPublisherController;

// ========== ФРОНТДОР ==========
Route::get('/', function () {
    return redirect()->route('library.index');
});
Route::resource('library', LibraryController::class);

// ========== ДАШБОРД ДЛЯ АДМИНА ==========
Route::prefix('admin')->name('admin.')->group(function() {
    Route::resource('authors', AdminAuthorController::class);
    Route::resource('books', AdminBookController::class);
    Route::resource('genres', AdminGenreController::class);
    Route::resource('publishers', AdminPublisherController::class);
});