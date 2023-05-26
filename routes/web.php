<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthorController;

use App\Http\Controllers\StudentController;


Auth::routes(['register' => false]);
// Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('', [App\Http\Controllers\StudentController::class, 'home'])->name('home');

    Route::get('students', [App\Http\Controllers\StudentController::class, 'index'])->name('students');
    Route::get('student/create', [App\Http\Controllers\StudentController::class, 'create'])->name('student.create');
    Route::post('student/store', [App\Http\Controllers\StudentController::class, 'store'])->name('student.store');
    Route::get('student/edit/{student}', [App\Http\Controllers\StudentController::class, 'edit'])->name('student.edit');
    Route::put('student/update/{student}', [App\Http\Controllers\StudentController::class, 'update'])->name('student.update');
    Route::delete('student/delete/{student}', [App\Http\Controllers\StudentController::class, 'destroy'])->name('student.delete');
    
    
    Route::get('books', [App\Http\Controllers\BookController::class, 'index'])->name('books');
    Route::get('book/create', [App\Http\Controllers\BookController::class, 'create'])->name('book.create');
    Route::post('book/store', [App\Http\Controllers\BookController::class, 'store'])->name('book.store');
    Route::get('book/edit/{book}', [App\Http\Controllers\BookController::class, 'edit'])->name('book.edit');
    Route::put('book/update/{book}', [App\Http\Controllers\BookController::class, 'update'])->name('book.update');
    Route::delete('book/delete/{book}', [App\Http\Controllers\BookController::class, 'destroy'])->name('book.delete');

    Route::get('book_rents', [App\Http\Controllers\BookRentController::class, 'index'])->name('book_rents');
    Route::get('book_rent/create', [App\Http\Controllers\BookRentController::class, 'create'])->name('book_rent.create');
    Route::post('book_rent/store', [App\Http\Controllers\BookRentController::class, 'store'])->name('book_rent.store');
    Route::get('book_rent/edit/{book_rent}', [App\Http\Controllers\BookRentController::class, 'edit'])->name('book_rent.edit');
    Route::put('book_rent/update/{book_rent}', [App\Http\Controllers\BookRentController::class, 'update'])->name('book_rent.update');
    Route::delete('book_rent/delete/{book_rent}', [App\Http\Controllers\BookRentController::class, 'destroy'])->name('book_rent.delete');

   
});

