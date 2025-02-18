<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Middleware\CheckRole;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SuperAdmin\SuperAdminDashboardController;
use App\Http\Controllers\Management\UserManagementController;
use App\Http\Controllers\Management\BooksController;
use App\Http\Controllers\Management\BorrowHistoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


//Home
Route::get('/', function () {
    return redirect()->route('login');
});


// Routes for guests
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
    //post
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/register', [RegisterController::class, 'register']);
});

//Routes for authenticated users
Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [LogoutController::class, 'perform'])->name('logout');
});


// Routes for Superadmins
Route::middleware(['auth', 'CheckRole:superadmin'])->group(function () {
    Route::get('/superadmin', [SuperAdminDashboardController::class, 'index'])->name('superadmin.home');
});

// Routes for Admins
Route::middleware(['auth', 'CheckRole:admin'])->group(function () {
    Route::get('/admin', [HomeController::class, 'adminHome'])->name('admin.home');
});

// Routes for Users
Route::middleware(['auth', 'CheckRole:user'])->group(function () {
    Route::get('/user', [HomeController::class, 'userHome'])->name('user.home');
});

//MANAGE USERS
Route::middleware(['auth', 'CheckRole:admin,superadmin'])->group(function () {
    Route::get('/manage/users', [UserManagementController::class, 'users'])->name('user.manage');
    Route::get('/view/user/{id}', [UserManagementController::class, 'details'])->name('user.details'); 
    Route::get('/create/user/', [UserManagementController::class, 'create'])->name('user.create'); 
    Route::get('/edit/user/{id}', [UserManagementController::class, 'edit'])->name('user.edit'); 
    Route::post('/store/user/', [UserManagementController::class, 'store'])->name('user.store');
    Route::post('/update/user/{id}', [UserManagementController::class, 'update'])->name('user.update');
    Route::delete('/delete/user/{id}', [UserManagementController::class, 'delete'])->name('user.delete');
});


//MANAGE Books
Route::middleware(['auth', 'CheckRole:admin,superadmin'])->group(function () {
    Route::get('/manage/books', [BooksController::class, 'books'])->name('book.manage');
    Route::get('/view/book/{id}', [BooksController::class, 'details'])->name('book.details'); 
    Route::get('/create/book/', [BooksController::class, 'create'])->name('book.create'); 
    Route::get('/edit/book/{id}', [BooksController::class, 'edit'])->name('book.edit'); 
    Route::post('/store/book/', [BooksController::class, 'store'])->name('book.store');
    Route::put('/update/book/{id}', [BooksController::class, 'update'])->name('book.update');
    Route::delete('/delete/book/{id}', [BooksController::class, 'delete'])->name('book.delete');
});

//MANAGE Books BorrowHistory
Route::middleware(['auth', 'CheckRole:admin,superadmin'])->group(function () {
    Route::get('/manage/bbh', [BorrowHistoryController::class, 'borrowhistory'])->name('bbh.manage'); 
    Route::get('/manage/borrowed', [BorrowHistoryController::class, 'allborrowedBooks'])->name('bbh.borrowed');
    Route::get('/manage/returned', [BorrowHistoryController::class, 'allreturnedBooks'])->name('bbh.returned');

    Route::get('/view/bbh/{id}', [BorrowHistoryController::class, 'details'])->name('bbh.details'); 
    Route::get('/create/bbh/', [BorrowHistoryController::class, 'create'])->name('bbh.create'); 
    Route::get('/edit/bbh/{id}', [BorrowHistoryController::class, 'edit'])->name('bbh.edit'); 
    Route::post('/store/bbh/', [BorrowHistoryController::class, 'store'])->name('bbh.store');
    Route::post('/update/bbh/{id}', [BorrowHistoryController::class, 'update'])->name('bbh.update');
    Route::delete('/delete/bbh/{id}', [BorrowHistoryController::class, 'delete'])->name('bbh.delete');
});

// Borrowing and Returning Books
Route::middleware(['auth', 'CheckRole:superadmin,admin,user'])->group(function () {
    Route::get('/books', [BorrowHistoryController::class, 'books'])->name('books'); 
    Route::get('/book/{id}', [BorrowHistoryController::class, 'viewBook'])->name('book.view'); 
    Route::get('/dashboard', [BorrowHistoryController::class, 'userbbh'])->name('dashboard'); 
    Route::post('/borrow/book/{id}', [BorrowHistoryController::class, 'borrowBook'])->name('book.borrow'); 
    Route::post('/books/{bookId}/return/{borrowedId}', [BorrowHistoryController::class, 'returnBook'])->name('book.return'); 
});




