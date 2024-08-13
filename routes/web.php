<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('home');


// THESE CAN BE GROUPED
Route::post('/tasks', [TodoController::class, 'store'])->name('tasks.store');

Route::get('/tasks/{id}/edit', [TodoController::class, 'edit'])->name('tasks.edit')->middleware(['auth']);

Route::put('/tasks/{id}', [TodoController::class, 'update'])->name('tasks.update')->middleware(['auth']);

Route::delete('/tasks/{id}', [TodoController::class, 'destroy'])->name('tasks.destroy')->middleware(['auth']);

Route::post('/tasks/{id}/check', [TodoController::class, 'check'])->name('tasks.check')->middleware(['auth']);
// THESE CAN BE GROUPED


// GROUP
Route::get('/register', [AuthController::class, 'register'])->name('register');

Route::post('/register', [AuthController::class, 'store']);

Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::post('/login', [AuthController::class, 'authenticate']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
//GROUP


Route::get('/profile', [ProfileController::class, 'index'])->name('profile')->middleware(['auth']);
