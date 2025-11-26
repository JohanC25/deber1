<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SchoolClassController;
use App\Http\Controllers\EnrollmentController;


Route::get('/', function () {
return redirect()->route('students.index');
});


Route::resource('teachers', TeacherController::class);
Route::resource('students', StudentController::class);
Route::resource('classes', SchoolClassController::class)->parameters(['classes' => 'class']);


// Enrollment routes
Route::get('classes/{class}/enroll', [EnrollmentController::class, 'enrollForm'])->name('classes.enroll.form');
Route::post('classes/{class}/enroll', [EnrollmentController::class, 'enroll'])->name('classes.enroll');
Route::delete('classes/{class}/students/{student}', [EnrollmentController::class, 'withdraw'])->name('classes.withdraw');