<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\TeacherController;
use App\Controllers\CustomController;
use Illuminate\Support\Facades\Route;

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

Route::get('courses/', [CourseController::class, 'index'])->name('courses.index');
Route::get('courses/create', [CourseController::class, 'create'])->name('courses.create');
Route::get('courses/{course}/edit', [CourseController::class, 'edit'])->name('courses.edit');
Route::post('courses', [CourseController::class, 'insert'])->name('courses.insert');
Route::put('courses/{course}', [CourseController::class, 'save'])->name('courses.save');
Route::get('courses/{course}/delete', [CourseController::class, 'remove'])->name('courses.remove');
Route::delete('courses/{course}', [CourseController::class, 'delete'])->name('courses.delete');


Route::get('grades/', [GradeController::class, 'index'])->name('grades.index');
Route::get('grades/create', [GradeController::class, 'create'])->name('grades.create');
Route::get('grades/{grade_id}/edit', [GradeController::class, 'edit'])->name('grades.edit');
Route::post('grades', [GradeController::class, 'insert'])->name('grades.insert');
Route::put('grades/{grade}', [GradeController::class, 'save'])->name('grades.save');
Route::get('grades/{grade}/delete', [GradeController::class, 'remove'])->name('grades.remove');
Route::delete('grades/{grade}', [GradeController::class, 'delete'])->name('grades.delete');


Route::get('students/', [StudentController::class, 'index'])->name('students.index');
Route::get('students/create', [StudentController::class, 'create'])->name('students.create');
Route::get('students/{student}/edit', [StudentController::class, 'edit'])->name('students.edit');
Route::post('students', [StudentController::class, 'insert'])->name('students.insert');
Route::put('students/{student}', [StudentController::class, 'save'])->name('students.save');
Route::get('students/{student}/delete', [StudentController::class, 'remove'])->name('students.remove');
Route::delete('students/{student}', [StudentController::class, 'delete'])->name('students.delete');



Route::get('teachers/', [TeacherController::class, 'index'])->name('teachers.index');
Route::get('teachers/create', [TeacherController::class, 'create'])->name('teachers.create');
Route::get('teachers/{teacher}/edit', [TeacherController::class, 'edit'])->name('teachers.edit');
Route::post('teachers', [TeacherController::class, 'insert'])->name('teachers.insert');
Route::put('teachers/{teacher}', [TeacherController::class, 'save'])->name('teachers.save');
Route::get('teachers/{teacher}/delete', [TeacherController::class, 'remove'])->name('teachers.remove');
Route::delete('teachers/{teacher}', [TeacherController::class, 'delete'])->name('teachers.delete');
