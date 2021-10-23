<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AnnouncementController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\TeacherSubjectController;

Route::group(['prefix' => 'admin', 'middleware' => ['role:admin']], function () {
    // manage teacher
    Route::get('/manage-teacher', [TeacherController::class, 'index'])->name('manage-teacher');
    Route::get('/manage-teacher/create', [TeacherController::class, 'create'])->name('teacher-create');
    Route::post('/manage-teacher/store', [TeacherController::class, 'store'])->name('teacher-store');
    Route::get('/manage-teacher/{id}/edit', [TeacherController::class, 'edit'])->name('teacher-edit');
    Route::post('/manage-teacher/{id}/update', [TeacherController::class, 'update'])->name('teacher-update');
    Route::get('/manage-teacher/{id}/delete', [TeacherController::class, 'destroy'])->name('teacher-destroy');

    // manage student
    Route::get('/manage-student', [StudentController::class, 'index'])->name('manage-student');
    Route::get('/manage-student/create', [StudentController::class, 'create'])->name('student-create');
    Route::post('/manage-student/store', [StudentController::class, 'store'])->name('student-store');
    Route::get('/manage-student/{id}/edit', [StudentController::class, 'edit'])->name('student-edit');
    Route::post('/manage-student/{id}/update', [StudentController::class, 'update'])->name('student-update');
    Route::get('/manage-student/{id}/delete', [StudentController::class, 'destroy'])->name('student-delete');

    // manage subject
    Route::get('/manage-subject', [SubjectController::class, 'index'])->name('manage-subject');
    Route::get('/subject-create', [SubjectController::class, 'create'])->name('subject-create');

    // manage schedule
    Route::get('/manage-schedule', [ScheduleController::class, 'index'])->name('manage-schedule');
    Route::get('/manage-announcement', [AnnouncementController::class, 'index'])->name('manage-announcement');

    // manage announcement
    Route::get('/annnouncement-create', [AnnouncementController::class, 'create'])->name('announcement-create');
});
