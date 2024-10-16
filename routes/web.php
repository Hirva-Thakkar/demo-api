<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryController;

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
Route::post('/country-details/{name}', [CountryController::class, 'index'])->name('country.Details');
Route::get('/create', [CountryController::class, 'create'])->name('country.create');
Route::get('/currency', [CountryController::class, 'createCurrency'])->name('currency.create');
Route::post('/currencypost', [CountryController::class, 'storeCurrency'])->name('store.currency');
