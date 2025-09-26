<?php

use App\Http\Controllers\LibraryController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookLoanController;
use App\Http\Controllers\MemberController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('libraries', LibraryController::class);
Route::resource('books', BookController::class);
Route::resource('members', MemberController::class);

Route::get('book_loans', [BookLoanController::class, 'index'])->name('book_loans.index');
Route::get('book_loans/create', [BookLoanController::class, 'create'])->name('book_loans.create');
Route::post('book_loans', [BookLoanController::class, 'store'])->name('book_loans.store');
Route::post('book_loans/{member}/{book}/return', [BookLoanController::class, 'returnBook'])->name('book_loans.return');
