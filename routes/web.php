<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\subjectController;
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

Route::middleware(['admin'])->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    });

    Route::get('students', function () {
        return view('students');
    });

    Route::get('subjects', function () {
        return view('subjects');
    });

    Route::post('newStudentData', [StudentController::class, 'addStudent']);
    Route::get('students', [StudentController::class, 'getStudent']);
    Route::get('filterStudents', [StudentController::class, 'filterStudents']);

    Route::post('newSubjectData', [SubjectController::class, 'addSubject']);
    Route::get('subjects', [SubjectController::class, 'getSubjects']);
    Route::get('filterSubjects', [SubjectController::class, 'filterSubjects']);
});

Route::get('login', function () {
    return view('loginForm');
});

Route::post('process_login', [adminController::class, 'rememberAdmin']);
Route::get('/logout', [adminController::class, 'forgetAdmin']);