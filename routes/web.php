<?php

use App\Http\Controllers\ApprenticeController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\ComputerController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TrainingCenterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('areas', [AreaController::class, 'index'])->name('areas.index');
Route::get('areas/{id}', [AreaController::class, 'show'])->name('areas.show');

Route::get('training-centers', [TrainingCenterController::class, 'index'])->name('training-centers.index');
Route::get('training-centers/{id}', [TrainingCenterController::class, 'show'])->name('training-centers.show');

Route::get('teachers', [TeacherController::class, 'index'])->name('teachers.index');
Route::get('teachers/{id}', [TeacherController::class, 'show'])->name('teachers.show');

Route::get('courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('courses/{id}', [CourseController::class, 'show'])->name('courses.show');

Route::get('computers', [ComputerController::class, 'index'])->name('computers.index');
Route::get('computers/{id}', [ComputerController::class, 'show'])->name('computers.show');

Route::get('apprentices', [ApprenticeController::class, 'index'])->name('apprentices.index');
Route::get('apprentices/{id}', [ApprenticeController::class, 'show'])->name('apprentices.show');
