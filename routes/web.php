<?php

use App\Http\Controllers\adminController;
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
});

Route::get('login', function () {
    return view('loginForm');
});

Route::post('process_login', [adminController::class, 'rememberAdmin']);
Route::get('/logout', [adminController::class, 'forgetAdmin']);
