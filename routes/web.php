<?php

use App\Http\Controllers\student\AnnouncementController;
use App\Http\Controllers\student\DashboardController;
use App\Http\Controllers\student\MaterialController;
use App\Http\Controllers\student\TaskController;
use App\Http\Controllers\Student\AbsentController;
use App\Http\Controllers\Student\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\GoogleController;

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

Auth::routes();

Route::get('/', function () {
    return redirect()->route('login');
});

//Route Google
Route::get('auth/google', [GoogleController::class, 'authGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'googleCallback']);


// prefix for student
Route::group(['prefix' => 'student', 'middleware' => ['role:student']], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('student-dashboard');
    Route::get('absent', [AbsentController::class, 'index'])->name('absent');
    Route::get('material', [MaterialController::class, 'index'])->name('list-material');
    Route::get('task', [TaskController::class, 'index'])->name('list-task');
    Route::get('profile', [ProfileController::class, 'index'])->name('profile-student');


    // announcement
    Route::get('announcement/{id}/detail',[AnnouncementController::class, 'show'])->name('announcement-detail');
});
