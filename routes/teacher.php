<?php

use App\Http\Controllers\Teacher\AnnouncementController;
use App\Http\Controllers\Teacher\DashboardController;
use App\Http\Controllers\Teacher\MaterialController;
use App\Http\Controllers\Teacher\TaskController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'teacher', 'middleware' => ['role:teacher']], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('teacher-dashboard');
    Route::get('manage-material', [MaterialController::class, 'index'])->name('manage-material');
    Route::post('manage-material/post', [MaterialController::class, 'store'])->name('post-material');
    Route::get('manage-task', [TaskController::class, 'index'])->name('manage-task');
    Route::get('profile', [\App\Http\Controllers\Teacher\ProfileController::class, 'index'])->name('profile-teacher');
    Route::post('profile/update/{id}', [\App\Http\Controllers\Teacher\ProfileController::class, 'update']);
    // announcement
    Route::get('announcement/{id}/detail', [AnnouncementController::class, 'show'])->name('announcement-detail');

    //task
    Route::get('/create', [TaskController::class, 'post'])->name('teacher-task');
});
