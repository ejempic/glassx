<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuotationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductManagementController;

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


Route::get('/', 'App\Http\Controllers\QuotationController@index')
    ->middleware(['auth', 'verified'])->name('quotation');

Route::middleware('auth')->group(function () {

    Route::get('/', [QuotationController::class, 'index'])->name('quotation');
//    Route::get('/employees', [ProfileController::class, 'index'])->name('employees');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::get('/employees/{user}/edit', [ProfileController::class, 'edit'])->name('employees.edit');
//    Route::patch('/profile/{user}/', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('employees', ProfileController::class)->except(['show']);


    Route::resource('product-management', ProductManagementController::class);
    Route::post('product-management-upload', [ProductManagementController::class, 'upload'])->name('product-management.upload');

});

require __DIR__ . '/auth.php';
