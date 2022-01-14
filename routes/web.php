<?php

use App\Http\Controllers\Client\ProfesiController as ClientProfesiController;
use App\Http\Controllers\Client\QuotationController as ClientQuotationController;
use App\Http\Controllers\PrefixControlller;
use App\Http\Controllers\ProfesiController;
use App\Http\Controllers\QuotationController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();
Route::middleware('auth')->prefix('/admin')->name('admin.')->group(function () {
    Route::resource('prefix', PrefixControlller::class);
    Route::resource('profesi',ProfesiController::class);
    Route::resource('quotation',QuotationController::class);
});

Route::middleware('auth')->prefix('/client')->name('client.')->group(function () {
    Route::resource('profesi',ClientProfesiController::class);
    Route::resource('quotation',ClientQuotationController::class);
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
