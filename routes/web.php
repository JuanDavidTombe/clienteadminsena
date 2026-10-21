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
Route::get('areas/create', [AreaController::class, 'create'])->name('areas.create');
Route::post('areas', [AreaController::class, 'store'])->name('areas.store');
Route::get('areas/{id}', [AreaController::class, 'show'])->name('areas.show');
Route::get('areas/{id}/edit', [AreaController::class, 'edit'])->name('areas.edit');
Route::put('areas/{id}', [AreaController::class, 'update'])->name('areas.update');
Route::delete('areas/{id}', [AreaController::class, 'destroy'])->name('areas.destroy');

Route::get('training-centers', [TrainingCenterController::class, 'index'])->name('training-centers.index');
Route::get('training-centers/create', [TrainingCenterController::class, 'create'])->name('training-centers.create');
Route::post('training-centers', [TrainingCenterController::class, 'store'])->name('training-centers.store');
Route::get('training-centers/{id}', [TrainingCenterController::class, 'show'])->name('training-centers.show');
Route::get('training-centers/{id}/edit', [TrainingCenterController::class, 'edit'])->name('training-centers.edit');
Route::put('training-centers/{id}', [TrainingCenterController::class, 'update'])->name('training-centers.update');
Route::delete('training-centers/{id}', [TrainingCenterController::class, 'destroy'])->name('training-centers.destroy');

Route::get('teachers', [TeacherController::class, 'index'])->name('teachers.index');
Route::get('teachers/create', [TeacherController::class, 'create'])->name('teachers.create');
Route::post('teachers', [TeacherController::class, 'store'])->name('teachers.store');
Route::get('teachers/{id}', [TeacherController::class, 'show'])->name('teachers.show');
Route::get('teachers/{id}/edit', [TeacherController::class, 'edit'])->name('teachers.edit');
Route::put('teachers/{id}', [TeacherController::class, 'update'])->name('teachers.update');
Route::delete('teachers/{id}', [TeacherController::class, 'destroy'])->name('teachers.destroy');

Route::get('courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('courses/create', [CourseController::class, 'create'])->name('courses.create');
Route::post('courses', [CourseController::class, 'store'])->name('courses.store');
Route::get('courses/{id}', [CourseController::class, 'show'])->name('courses.show');
Route::get('courses/{id}/edit', [CourseController::class, 'edit'])->name('courses.edit');
Route::put('courses/{id}', [CourseController::class, 'update'])->name('courses.update');
Route::delete('courses/{id}', [CourseController::class, 'destroy'])->name('courses.destroy');

Route::get('computers', [ComputerController::class, 'index'])->name('computers.index');
Route::get('computers/create', [ComputerController::class, 'create'])->name('computers.create');
Route::post('computers', [ComputerController::class, 'store'])->name('computers.store');
Route::get('computers/{id}', [ComputerController::class, 'show'])->name('computers.show');
Route::get('computers/{id}/edit', [ComputerController::class, 'edit'])->name('computers.edit');
Route::put('computers/{id}', [ComputerController::class, 'update'])->name('computers.update');
Route::delete('computers/{id}', [ComputerController::class, 'destroy'])->name('computers.destroy');

Route::get('apprentices', [ApprenticeController::class, 'index'])->name('apprentices.index');
Route::get('apprentices/create', [ApprenticeController::class, 'create'])->name('apprentices.create');
Route::post('apprentices', [ApprenticeController::class, 'store'])->name('apprentices.store');
Route::get('apprentices/{id}', [ApprenticeController::class, 'show'])->name('apprentices.show');
Route::get('apprentices/{id}/edit', [ApprenticeController::class, 'edit'])->name('apprentices.edit');
Route::put('apprentices/{id}', [ApprenticeController::class, 'update'])->name('apprentices.update');
Route::delete('apprentices/{id}', [ApprenticeController::class, 'destroy'])->name('apprentices.destroy');
