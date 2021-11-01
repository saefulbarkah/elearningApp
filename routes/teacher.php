<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Teacher\MaterialController;
use App\Http\Controllers\Teacher\TaskController;

Route::group(['prefix' => 'teacher', 'middleware' => ['role:teacher']], function () {
    Route::get('manage-material', [MaterialController::class, 'index'])->name('manage-material');
    Route::get('manage-task', [TaskController::class, 'index'])->name('manage-task');
    Route::get('profile', [\App\Http\Controllers\Teacher\ProfileController::class, 'index'])->name('profile-teacher');
});
