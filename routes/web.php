<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth'])->group(function () {

    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::get('/task/new', [TaskController::class, 'create'])->name('task.create');
    Route::get('/task/edit', [TaskController::class, 'edit'])->name('task.edit');
    Route::get('/task/delete', [TaskController::class, 'delete'])->name('task.delete');
    Route::post('/task/update', [TaskController::class, 'update'])->name('task.update');

    Route::post('/task/create_action', [TaskController::class, 'create_action'])->name('task.create_action');
    Route::post('/task/edit_action', [TaskController::class, 'edit_action'])->name('task.put_action');
    Route::get('/task/delete_action', [TaskController::class, 'delete_action'])->name('task.delete_action');

    Route::get('/logout', [AuthController::class, 'logout_action'])->name('logout_action');
});



Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');

Route::post('/login_action', [AuthController::class, 'index_action'])->name('login_action');
Route::post('/register_action', [AuthController::class, 'register_action'])->name('register_action');
