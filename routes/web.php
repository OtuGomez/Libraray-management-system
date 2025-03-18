<?php

use App\Http\Controllers\BooksController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Middleware\CheckAdminRole;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route("login");
})->name("welcome");



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    // users
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/book-search', [DashboardController::class, 'filterBook'])->name('books.search');
    Route::post('/borrow-book/{book_id}', [DashboardController::class, 'borrowBook'])->name('book.borrow');
    Route::post('/return-borrow-book/{book_id}', [DashboardController::class, 'returnBorrowedBook'])->name('return.book');



    // admin
    Route::resource("manage-users", UsersController::class)->middleware(CheckAdminRole::class);

    Route::resource("manage-books", BooksController::class)->middleware(CheckAdminRole::class);


});




require __DIR__.'/auth.php';
