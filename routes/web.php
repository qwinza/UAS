<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CashierController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPassowordController;



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

Route::redirect('/', '/login')
    ->middleware(['guest']);

Route::get('/login', [LoginController::class, 'index'])
    ->middleware(['guest'])
    ->name('login');

Route::post('/login', [LoginController::class, 'store'])
    ->middleware(['guest']);

Route::get('/register', [RegisterController::class, 'index'])
    ->middleware(['guest'])
    ->name('register');

Route::post('/register', [RegisterController::class, 'register'])
    ->middleware(['guest']);

Route::post('/logout', [LoginController::class, 'logout'])
    ->middleware(['auth'])
    ->name('logout');

Route::get('/cashier', [CashierController::class, 'index'])
    ->middleware(['auth'])
    ->name('cashier');

Route::get('/invoices', [InvoiceController::class, 'index'])
    ->middleware(['auth'])
    ->name('invoice.index');

Route::get('/invoices/{invoice}', [InvoiceController::class, 'show'])
    ->middleware(['auth'])
    ->name('invoice.show');

Route::resource('products', ProductController::class);

Route::get('products/{id}/edit', [ProductController::class, 'edit'])
    ->name('products.edit');

Route::put('products/{id}', [ProductController::class, 'update'])
    ->name('products.update');

Route::delete('/products/{product}', [ProductController::class, 'destroy'])
    ->name('products.destroy');
