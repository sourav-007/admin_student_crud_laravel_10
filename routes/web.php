<?php

use App\Http\Controllers\DemoController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\StudentController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard',[StudentController::class, 'index'])->name('dashboard');
    Route::resource('/student',StudentController::class);
    // Route::get('/student/{id}', [StudentController::class, 'show'])->name('student.show');
    Route::delete('/student/{id}', [StudentController::class, 'destroy'])->name('student.destroy');
    Route::get('/student/{id}/edit', [StudentController::class, 'edit'])->name('student.edit');
    Route::put('/student/{id}', [StudentController::class, 'update'])->name('student.update');
    Route::get('/student/{id}/pdf', [StudentController::class, 'generatePDF'])->name('student.generatePDF');
    Route::get('/students/export-excel', [StudentController::class, 'exportExcel'])->name('students.export.excel');

    Route::get('/countries', [LocationController::class, 'getCountries'])->name('countries');
    Route::get('/states/{country_id}', [LocationController::class, 'getStates'])->name('states');
    Route::get('/cities/{state_id}', [LocationController::class, 'getCities'])->name('cities');

});