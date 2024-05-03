<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\InvoiceController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin', function () {
    return view('admin.dashboard');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



// Users Routes
Route::get('/admin-cp/users', [UserController::class, 'index'])->name('users.index');
Route::get('/admin-cp/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/admin-cp/users/store', [UserController::class, 'store'])->name('users.store');


// Files Routes
Route::get('/admin-cp/files', [FileController::class, 'index'])->name('files.index');
Route::get('/admin-cp/files/create', [FileController::class, 'create'])->name('files.create');
Route::post('/admin-cp/files/store', [FileController::class, 'store'])->name('files.store');

// Invoices Routes
Route::get('/admin-cp/invoices', [InvoiceController::class, 'index'])->name('invoices.index');
Route::get('/admin-cp/invoices/create', [InvoiceController::class, 'create'])->name('invoices.create');
Route::post('/admin-cp/invoices/store', [InvoiceController::class, 'store'])->name('invoices.store');
Route::get('/admin-cp/invoices/show/{userId}', [InvoiceController::class, 'show'])->name('invoices.show');
