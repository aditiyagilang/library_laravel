<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowingController;
use App\Http\Controllers\ReturnController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\AuthController;


Route::get('/', [AuthController::class, 'dashboard'])->name('dashboard');
Route::resource('student', StudentController::class);
Route::resource('students', StudentController::class);

// Routes for Books
Route::resource('books', BookController::class);
Route::resource('book', BookController::class);

Route::resource('borrowings', BorrowingController::class);
Route::resource('returns', ReturnController::class);
Route::get('/download-borrowing-report', [ReportController::class, 'downloadBorrowingReport'])->name('report.borrowing.download');
Route::get('/download-student-report', [ReportController::class, 'downloadStudentReport'])->name('report.student.download');
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', function () {

    Session::forget('users_id');

    return redirect('/login');
})->name('logout');