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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/home', function () {
    return view('home');
});
Route::get('/supplies', [App\Http\Controllers\SuppliesController::class, 'index'])->middleware(['auth'])->name('supplies.index');
Route::get('/supplies/create', [App\Http\Controllers\SuppliesController::class, 'create'])->middleware(['auth'])->name('supplies.create');
Route::post('/supplies', [App\Http\Controllers\SuppliesController::class, 'store'])->middleware(['auth'])->name('supplies.store');
Route::get('/supplies/{id}', [App\Http\Controllers\SuppliesController::class, 'show'])->middleware(['auth'])->name('supplies.show'); 
Route::get('/supplies/{id}/edit', [App\Http\Controllers\SuppliesController::class, 'edit'])->middleware(['auth'])->name('supplies.edit');
Route::put('/supplies/{id}', [App\Http\Controllers\SuppliesController::class, 'update'])->middleware(['auth'])->name('supplies.update');
Route::delete('supplies/{id}', [App\Http\Controllers\SuppliesController::class, 'destroy'])->middleware(['auth'])->name('supplies.destroy');