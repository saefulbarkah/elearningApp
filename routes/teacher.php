<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Teacher\DashboardController;
use App\Http\Controllers\Teacher\MaterialController;
use App\Http\Controllers\Teacher\StudentController;
use App\Http\Controllers\Teacher\TaskController;

// prefix for teacher
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::group(['prefix' => 'teacher', 'middleware' => ['role:teacher']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('manage-material', [MaterialController::class, 'index'])->name('manage-material');
    Route::get('manage-task', [TaskController::class, 'index'])->name('manage-task');
    Route::get('filter-student', [StudentController::class, 'filter'])->name('filter-student');

});
