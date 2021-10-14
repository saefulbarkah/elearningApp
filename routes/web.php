<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('dashboard');

Route::group(['middleware' => ['role:admin|teacher|student']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('filter-student', [StudentController::class, 'filter'])->name('filter-student');
    Route::get('filter-teacher', [TeacherController::class, 'filter'])->name('filter-teacher');
});

// prefix for admin
Route::group(['prefix' => 'admin', 'middleware' => ['role:admin']], function () {
    Route::get('/manage-teacher', [TeacherController::class, 'index'])->name('manage-teacher');
    Route::get('/manage-student', [StudentController::class, 'index'])->name('manage-student');
    Route::get('/manage-subject', [SubjectController::class, 'index'])->name('manage-subject');
    Route::get('/manage-schedule', [ScheduleController::class, 'index'])->name('manage-schedule');
    Route::get('/manage-announcement', [AnnouncementController::class, 'index'])->name('manage-announcement');
});

// prefix for teacher
Route::group(['prefix' => 'teacher', 'middleware' => ['role:teacher']], function () {
    Route::get('manage-material', [MaterialController::class, 'index'])->name('manage-material');
    Route::get('manage-task', [TaskController::class, 'index'])->name('manage-task');
});

// prefix for student
Route::group(['prefix' => 'student', 'middleware' => ['role:student']], function () {
    Route::get('material', [MaterialController::class, 'listMaterial'])->name('material');
    Route::get('task', [TaskController::class, 'listTask'])->name('task');
});
