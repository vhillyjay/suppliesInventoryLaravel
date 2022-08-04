<?php

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

// Route::get('/tryindex', function () {
//     return view('supplies.show');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/supplies', [App\Http\Controllers\SuppliesController::class, 'index'])->middleware(['auth']);
Route::get('/supplies/create', [App\Http\Controllers\SuppliesController::class, 'create'])->middleware(['auth']);
Route::post('/supplies', [App\Http\Controllers\SuppliesController::class, 'store'])->middleware(['auth']);
Route::get('/supplies/{id}', [App\Http\Controllers\SuppliesController::class, 'show'])->middleware(['auth']); 
Route::get('/supplies/{id}/edit', [App\Http\Controllers\SuppliesController::class, 'edit'])->middleware(['auth']);
Route::put('/supplies/{id}', [App\Http\Controllers\SuppliesController::class, 'update'])->middleware(['auth']);
Route::delete('supplies/{id}', [App\Http\Controllers\SuppliesController::class, 'destroy'])->middleware(['auth']);