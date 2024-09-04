<?php

use App\Http\Controllers\AddController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EditController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login.process');



Route::get('/create', function () {
    return view('addUser');
})->name('addUser');

Route::get('/addUser', [AddController::class, 'showaddUserForm'])->name('show');

// Route::post('/addUser', [AddController::class, 'addUser'])->name('show.process');


Route::get('/dashboard', [DashboardController::class, 'showdashboardForm'])->middleware('auth')->name('dashboard');

Route::post('/addUser', [AddController::class, 'store'])->name('users.create');

// Route::post('/editUser', [AddController::class, 'store'])->name('users.edit');

Route::get('/editUser/{id}', [AddController::class, 'editUserForm'])->name('users.edit');

Route::put('/updateUser/{id}', [AddController::class, 'updateUser'])->name('users.update');

// Route::delete('/delete-user/{id}', [AddController::class, 'deleteUser'])->name('users.delete');

Route::delete('/users/{id}', [AddController::class, 'delete'])->name('users.delete');


// Route::middleware(AdminMiddleware::class)->group(function () {
//     Route::get('/dashboard', [DashboardController::class, 'showdashboardForm'])->middleware('auth')->name('dashboard');
// });