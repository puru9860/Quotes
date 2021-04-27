<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\UserQuoteController;
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
    return redirect(route('quote.index'));
});

Route::get('/register',[RegisterController::class,'create'])->name('register');
Route::post('/register',[RegisterController::class,'store']);

Route::get('/login',[LoginController::class,'create'])->name('login');
Route::post('/login',[LoginController::class,'login']);

Route::post('/logout',[LogoutController::class,'logout'])->name('logout');



Route::get('/quotes',[QuoteController::class,'index'])->name('quote.index');
Route::post('/quote',[QuoteController::class,'store'])->name('quote.store');
Route::get('/quote',[QuoteController::class,'create'])->name('quote.create');
Route::get('/quote/{quote}/edit',[QuoteController::class,'edit'])->name('quote.edit');
Route::put('/quote/{quote}',[QuoteController::class,'update'])->name('quote.update');
Route::delete('/quote/{quote}',[QuoteController::class,'destroy'])->name('quote.destory');


Route::get('/users/{user}/quotes',[UserQuoteController::class,'index'])->name('users.quotes');

Route::post('/quotes/{quote}/favorite',[FavoriteController::class,'store'])->name('quotes.favorite');

