<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\RatingController;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;


Route::post('/books/{book}/comments', [CommentController::class, 'store'])->name('comments.store');
Route::post('/books/{book}/rate', [RatingController::class, 'store'])->name('ratings.store')->middleware('auth');
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::resource('books', BookController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::post('/books/{book}/comments', [CommentController::class, 'store'])->name('comments.store');
});

require __DIR__.'/auth.php';

Route::get('lang/{locale}', function ($locale) {
    session(['locale' => $locale]);
    return redirect()->back();
})->name('lang.switch');
