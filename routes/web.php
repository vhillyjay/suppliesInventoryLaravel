<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SuppliesController;
use App\Http\Controllers\ProfileController;

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

// Route::get('/home', function () {
//     return view('home');
// });
Route::get('/home', [HomeController::class, 'index'])->middleware(['auth'])->name('');
Route::get('/supplies', [SuppliesController::class, 'index'])->middleware(['auth'])->name('supplies.index');
Route::get('/supplies/create', [SuppliesController::class, 'create'])->middleware(['auth'])->name('supplies.create');
Route::post('/supplies', [SuppliesController::class, 'store'])->middleware(['auth'])->name('supplies.store');
Route::get('/supplies/{id}', [SuppliesController::class, 'show'])->middleware(['auth'])->name('supplies.show'); 
Route::get('/supplies/{id}/edit', [SuppliesController::class, 'edit'])->middleware(['auth'])->name('supplies.edit');
Route::put('/supplies/{id}', [SuppliesController::class, 'update'])->middleware(['auth'])->name('supplies.update');
Route::delete('supplies/{id}', [SuppliesController::class, 'destroy'])->middleware(['auth'])->name('supplies.destroy');

Route::get('/profile', [ProfileController::class, 'index'])->middleware(['auth'])->name('profile.index');
Route::get('/profile/change-password', [ProfileController::class, 'changepassword'])->middleware(['auth'])->name('profile.changepassword');
Route::post('/profile/change-password', [ProfileController::class, 'updatepassword'])->middleware(['auth'])->name('profile.updatepassword');
//upload file trial
Route::get('/profile/upload', [ProfileController::class, 'upload'])->middleware(['auth'])->name('profile.upload');
Route::post('/profile/upload', [ProfileController::class, 'uploadimage'])->middleware(['auth'])->name('profile.uploadimage');