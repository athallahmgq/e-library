<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Models\Book;

Route::resource('books', BookController::class);
Route::post('/create', [BookController::class, 'store'])->name('books.store');
Route::get('/show{book}', [BookController::class, 'show'])->name('books.show');
Route::get('/edit', [BookController::class, 'edit'])->name('edit');
Route::delete('/books/{id}', [BookController::class, 'destroy'])->name('destroy');




Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/create', function () {
    return view('books.create');
})->name('books.create');

Route::get('/edit', function () {
    return view('books.edit');
})->name('books.edit');


Route::redirect('/', 'dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [BookController::class, 'index'])->name('dashboard.index');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
