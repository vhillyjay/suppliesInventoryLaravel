<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SuppliesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\PDFController;

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
Route::get('/home', [HomeController::class, 'index'])
    ->middleware(['auth'])->name('home');
Route::get('/search', [HomeController::class, 'search'])
    ->middleware(['auth'])->name('home.search');

Route::get('/supplies', [SuppliesController::class, 'index'])
    ->middleware(['auth'])->name('supplies.index');
Route::get('/supplies/create', [SuppliesController::class, 'create'])
    ->middleware(['auth'])->name('supplies.create');
Route::get('/supplies/buy_sell_list', [SuppliesController::class, 'buy_sell_list'])
    ->middleware(['auth'])->name('supplies.buy_sell_list');
Route::post('/supplies', [SuppliesController::class, 'store'])
    ->middleware(['auth'])->name('supplies.store');
Route::get('/supplies/{id}', [SuppliesController::class, 'show'])
    ->middleware(['auth'])->name('supplies.show'); 
Route::get('/supplies/{id}/edit', [SuppliesController::class, 'edit'])
    ->middleware(['auth'])->name('supplies.edit');
Route::put('/supplies/{id}', [SuppliesController::class, 'update'])
    ->middleware(['auth'])->name('supplies.update');
Route::delete('/supplies/{id}', [SuppliesController::class, 'destroy'])
    ->middleware(['auth'])->name('supplies.destroy');
Route::get('/supplies/{id}/sell', [SuppliesController::class, 'sell'])
    ->middleware(['auth'])->name('supplies.sell');
Route::put('/supplies/{id}/sell', [SuppliesController::class, 'sellupdate'])
    ->middleware(['auth'])->name('supplies.sellupdate');
Route::get('/supplies/{id}/buy', [SuppliesController::class, 'buy'])
    ->middleware(['auth'])->name('supplies.buy');
Route::put('/supplies/{id}/buy', [SuppliesController::class, 'buyupdate'])
    ->middleware(['auth'])->name('supplies.buyupdate');

Route::get('/profile', [ProfileController::class, 'index'])->middleware(['auth'])->name('profile.index');
Route::get('/profile/change-password', [ProfileController::class, 'changepassword'])->middleware(['auth'])->name('profile.changepassword');
Route::post('/profile/change-password', [ProfileController::class, 'updatepassword'])->middleware(['auth'])->name('profile.updatepassword');
//trial2
Route::get('/profile/{id}/edit', [ProfileController::class, 'edit'])->middleware(['auth'])->name('profile.edit');
Route::put('/profile/{id}', [ProfileController::class, 'update'])->middleware(['auth'])->name('profile.update');
//downloadtrial
Route::get('/profile/{id}/download', [SuppliesController::class, 'downloadimage'])->middleware(['auth'])->name('supplies.downloadimage');
//admin only access
Route::get('/listofusers', [HomeController::class, 'listofusers'])->middleware(['auth', 'is_admin'])->name('adminaccess.listofusers');
Route::delete('/deleteusers/{id}', [ProfileController::class, 'admindestroyusers'])->middleware(['auth', 'is_admin'])->name('adminaccess.destroyusers');

Route::get('/transactions', [TransactionController::class, 'index'])
    ->middleware(['auth'])->name('transactions.index');
Route::get('/transactions/{id}', [TransactionController::class, 'show'])
    ->middleware(['auth'])->name('transactions.show'); // not working yet
Route::put('/transactions/{id}/buy', [TransactionController::class, 'buyupdate'])
    ->middleware(['auth'])->name('transactions.buyupdate');
Route::put('/transactions/{id}/sell', [TransactionController::class, 'sellupdate'])
    ->middleware(['auth'])->name('transactions.sellupdate');

//pdf
//sample
Route::get('/generate-pdf', [PDFController::class, 'generatePDF'])
    ->middleware(['auth'])->name('pdf.sample');
//sample

//pdf reports
Route::get('/pdf/supplies_inventory_list', [PDFController::class, 'supplies_inventory_list'])
    ->middleware(['auth'])->name('pdf.supplies_inventory_list');
Route::get('/pdf/transactions_list', [PDFController::class, 'transactions_list'])
    ->middleware(['auth'])->name('pdf.transactions_list');
Route::get('/pdf/{id}/transaction_receipt', [PDFController::class, 'transaction_receipt'])
    ->middleware(['auth'])->name('pdf.transaction_receipt');