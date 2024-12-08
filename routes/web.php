<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', [TaskController::class, 'index'])->name('task.index');
Route::post('/task', [TaskController::class, 'store'])->name('task.store');
Route::get('/task/{id}/edit', [TaskController::class, 'edit'])->name('task.edit');
Route::put('/task/{id}', [TaskController::class, 'update'])->name('task.update');
Route::delete('/task/{id}', [TaskController::class, 'destroy'])->name('task.destroy');