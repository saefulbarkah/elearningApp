<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AnnouncementController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\TeacherSubjectController;


Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');


Route::group(['prefix' => 'admin', 'middleware' => ['role:admin']], function () {
    Route::get('/manage-teacher', [TeacherController::class, 'index'])->name('manage-teacher');
    Route::get('/teacher-create',[TeacherController::class, 'create'])->name('teacher-create');
    Route::get('/manage-student', [StudentController::class, 'index'])->name('manage-student');
    Route::get('/student-create',[StudentController::class, 'create'])->name('student-create');
    Route::get('/manage-subject', [SubjectController::class, 'index'])->name('manage-subject');
    Route::get('/subject-create',[SubjectController::class, 'create'])->name('subject-create');
    Route::get('/manage-teacher-subject',[TeacherSubjectController::class, 'index'])->name('manage-teacher-subject');
    Route::get('/teacher-subject-create',[TeacherSubjectController::class, 'create'])->name('teacher-subject-create');
    Route::get('/manage-schedule', [ScheduleController::class, 'index'])->name('manage-schedule');
    Route::get('/manage-announcement', [AnnouncementController::class, 'index'])->name('manage-announcement');
    Route::get('/annnouncement-create',[AnnouncementController::class, 'create'])->name('announcement-create');
});
