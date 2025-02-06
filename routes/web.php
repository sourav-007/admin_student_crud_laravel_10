<?php

use App\Http\Controllers\DemoController;
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

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');

//      Route::resource('/student',StudentController::class);
//     // Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
//     // Route::post('/students/store', [StudentController::class, 'store'])->name('students.store'); 
//     // Route::resource('/demo',DemoController::class);
// });


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard',[StudentController::class, 'index'])->name('dashboard');
    Route::resource('/student',StudentController::class);
    Route::get('/student/{id}', [StudentController::class, 'show'])->name('student.show');
    Route::get('/student/{id}/pdf', [StudentController::class, 'generatePDF'])->name('student.generatePDF');
    Route::delete('/student/{id}', [StudentController::class, 'destroy'])->name('student.destroy');
    Route::get('/students/export-excel', [StudentController::class, 'exportExcel'])->name('students.export.excel');

});