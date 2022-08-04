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

Route::get('/supplies', [App\Http\Controllers\SuppliesController::class, 'index']);
Route::get('/supplies/create', [App\Http\Controllers\SuppliesController::class, 'create']);
Route::post('/supplies', [App\Http\Controllers\SuppliesController::class, 'store']);
Route::get('/supplies/{id}', [App\Http\Controllers\SuppliesController::class, 'show']); 
Route::get('/supplies/{id}/edit', [App\Http\Controllers\SuppliesController::class, 'edit']);
Route::put('/supplies/{id}', [App\Http\Controllers\SuppliesController::class, 'update']);
Route::delete('supplies/{id}', [App\Http\Controllers\SuppliesController::class, 'destroy']);