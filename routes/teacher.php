<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Teacher\MaterialController;
use App\Http\Controllers\Teacher\TaskController;
use App\Http\Controllers\Teacher\DashboardController;
use App\Http\Controllers\Teacher\AnnouncementController;

Route::group(['prefix' => 'teacher', 'middleware' => ['role:teacher']], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('teacher-dashboard');
    Route::get('manage-material', [MaterialController::class, 'index'])->name('manage-material');
    Route::post('manage-material', [MaterialController::class, 'store']);
    Route::get('manage-task', [TaskController::class, 'index'])->name('manage-task');
    Route::get('profile', [\App\Http\Controllers\Teacher\ProfileController::class, 'index'])->name('profile-teacher');


    // announcement
    Route::get('announcement/{id}/detail', [AnnouncementController::class, 'show'])->name('announcement-detail');
});
