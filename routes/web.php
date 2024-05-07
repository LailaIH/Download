<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\JobTitleController;



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
Route::middleware(['auth', 'admin.check'])->group(function () {

Route::get('/admin', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin');



// Users Routes
Route::get('/admin-cp/users', [UserController::class, 'index'])->name('users.index');
Route::get('/admin-cp/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/admin-cp/users/store', [UserController::class, 'store'])->name('users.store');
Route::get('/admin-cp/users/edit/{userId}', [UserController::class, 'edit'])->name('users.edit');
Route::put('/admin-cp/users/update/{userId}', [UserController::class, 'update'])->name('users.update');
Route::get('/admin-cp/user/profile/{userId}', [UserController::class, 'showProfile'])->name('users.showProfile');
Route::put('/admin-cp/user/update/profile/{userId}', [UserController::class, 'updateProfile'])->name('users.updateProfile');
Route::patch('/admin-cp/users/{user}', [UserController::class, 'updateStatus'])->name('users.updateStatus');


// Files Routes
Route::get('/admin-cp/files', [FileController::class, 'index'])->name('files.index');
Route::get('/admin-cp/files/create', [FileController::class, 'create'])->name('files.create');
Route::post('/admin-cp/files/store', [FileController::class, 'store'])->name('files.store');
Route::get('/admin-cp/files/edit/{fileId}', [FileController::class, 'edit'])->name('files.edit');
Route::put('/admin-cp/files/update/{fileId}', [FileController::class, 'update'])->name('files.update');
Route::patch('/admin-cp/files/{file}', [FileController::class, 'updateStatus'])->name('files.updateStatus');




// Invoices Routes
Route::get('/admin-cp/invoices', [InvoiceController::class, 'index'])->name('invoices.index');
Route::get('/admin-cp/invoices/create', [InvoiceController::class, 'create'])->name('invoices.create');
Route::post('/admin-cp/invoices/store', [InvoiceController::class, 'store'])->name('invoices.store');
Route::get('/admin-cp/invoices/show/{userId}', [InvoiceController::class, 'show'])->name('invoices.show');
Route::get('/admin-cp/invoices/edit/{invoiceId}', [InvoiceController::class, 'edit'])->name('invoices.edit');
Route::put('/admin-cp/invoices/update/{invoiceId}', [InvoiceController::class, 'update'])->name('invoices.update');
Route::patch('/admin-cp/invoices/{invoice}', [InvoiceController::class, 'updateStatus'])->name('invoices.updateStatus');




// Subscriptions Routes
Route::get('/admin-cp/subscriptions', [SubscriptionController::class, 'index'])->name('subscriptions.index');
Route::get('/admin-cp/subscriptions/create', [SubscriptionController::class, 'create'])->name('subscriptions.create');
Route::post('/admin-cp/subscriptions/store', [SubscriptionController::class, 'store'])->name('subscriptions.store');
Route::get('/admin-cp/subscriptions/edit/{subId}', [SubscriptionController::class, 'edit'])->name('subscriptions.edit');
Route::put('/admin-cp/subscriptions/update/{subId}', [SubscriptionController::class, 'update'])->name('subscriptions.update');
Route::patch('/admin-cp/subscriptions/{sub}', [SubscriptionController::class, 'updateStatus'])->name('subscriptions.updateStatus');


// job titles Routes
Route::get('/admin-cp/job_titles', [JobTitleController::class, 'index'])->name('job_titles.index');
Route::get('/admin-cp/job_titles/create', [JobTitleController::class, 'create'])->name('job_titles.create');
Route::post('/admin-cp/job_titles/store', [JobTitleController::class, 'store'])->name('job_titles.store');
Route::get('/admin-cp/job_titles/edit/{jobId}', [JobTitleController::class, 'edit'])->name('job_titles.edit');
Route::put('/admin-cp/job_titles/update/{jobId}', [JobTitleController::class, 'update'])->name('job_titles.update');
Route::patch('/admin-cp/job_titles/{job}', [JobTitleController::class, 'updateStatus'])->name('job_titles.updateStatus');
});
