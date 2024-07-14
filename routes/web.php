<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\subjectController;
use Illuminate\Support\Facades\Route;

Route::middleware(['admin'])->group(function () {
    Route::view('/', 'dashboard');

    Route::get('students', function () {
        return view('students');
    });

    Route::get('subjects', function () {
        return view('subjects');
    });

    Route::get('logout', [adminController::class, 'forgetAdmin']);

    // student routes
    Route::post('newStudentData', [StudentController::class, 'addStudent']);
    Route::get('students', [StudentController::class, 'getStudent']);
    Route::get('filterStudents', [StudentController::class, 'filterStudents']);
    Route::post('updateStudent', [StudentController::class, 'updateStudent']);
    Route::get('deleteStudent/{id}', [StudentController::class, 'deleteStudent']);

    // subject routes
    Route::post('newSubjectData', [SubjectController::class, 'addSubject']);
    Route::get('subjects', [SubjectController::class, 'getSubjects']);
    Route::get('filterSubjects', [SubjectController::class, 'filterSubjects']);
    Route::post('updateSubject', [SubjectController::class, 'updateSubject']);
    Route::get('deleteSubject/{id}', [SubjectController::class, 'deleteSubject']);
});

Route::get('login', function () {
    return view('loginForm');
});

Route::post('process_login', [adminController::class, 'rememberAdmin'])->name('process_login');
