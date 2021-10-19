<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TeacherController;
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

Route::get('/', function () {
    return view('welcome');
});

//Route Google
Route::get('auth/google', [GoogleController::class, 'authGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'googleCallback']);

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('dashboard');
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

// prefix for student
Route::group(['prefix' => 'student', 'middleware' => ['role:student']], function () {
    Route::get('material', [MaterialController::class, 'listMaterial'])->name('material');
    Route::get('task', [TaskController::class, 'listTask'])->name('task');
    Route::get('check-in', [StudentController::class, 'checkIn'])->name('check-in');
    Route::get('filter-teacher', [TeacherController::class, 'filter'])->name('filter-teacher');
});
