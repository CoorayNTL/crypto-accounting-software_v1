<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\CryptoPriceController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\WalletController;

Route::group([
    'middleware' => 'api',
    'prefix' => 'v1'
], function ($router) {
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api')->name('logout');
    Route::post('/refresh', [AuthController::class, 'refresh'])->middleware('auth:api')->name('refresh');
    Route::get('/me', [AuthController::class, 'me'])->middleware('auth:api')->name('me');

    // Transactions
    Route::post('/transactions', [TransactionController::class, 'store'])->middleware('auth:api')->name('transactions');
    Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions');
    Route::get('/transactions/{id}', [TransactionController::class, 'show'])->name('transactions');

    //CryptoPrice
    Route::post('/cryptoprice', [CryptoPriceController::class, 'store'])->middleware('auth:api')->name('cryptoprice');
    Route::get('/cryptoprice', [CryptoPriceController::class, 'index'])->middleware('auth:api')->name('cryptoprice');
    Route::get('/cryptoprice/{id}', [CryptoPriceController::class, 'show'])->middleware('auth:api')->name('cryptoprice');
    Route::put('/cryptoprice/{id}', [CryptoPriceController::class, 'update'])->middleware('auth:api')->name('cryptoprice');
    Route::delete('/cryptoprice/{id}', [CryptoPriceController::class, 'destroy'])->middleware('auth:api')->name('cryptoprice');
    Route::get('cryptoprice/transections/{id}', [CryptoPriceController::class, 'transactions'])->middleware('auth:api')->name('cryptoprice');
    Route::get('cryptoprice/portfolios/{id}', [CryptoPriceController::class, 'portfolios'])->middleware('auth:api')->name('cryptoprice');
    Route::get('cryptoprice/wallets/{id}', [CryptoPriceController::class, 'wallets'])->middleware('auth:api')->name('cryptoprice');

    //Portfolio
    Route::post('/portfolio', [PortfolioController::class, 'store'])->middleware('auth:api')->name('portfolio');
    Route::get('/portfolio', [PortfolioController::class, 'index'])->middleware('auth:api')->name('portfolio');
    Route::get('/portfolio/{id}', [PortfolioController::class, 'show'])->middleware('auth:api')->name('portfolio');
    Route::put('/portfolio/{id}', [PortfolioController::class, 'update'])->middleware('auth:api')->name('portfolio');
    Route::delete('/portfolio/{id}', [PortfolioController::class, 'destroy'])->middleware('auth:api')->name('portfolio');

    //Wallet
    Route::post('/wallet', [WalletController::class, 'store'])->middleware('auth:api')->name('wallet');
    Route::get('/wallet', [WalletController::class, 'index'])->middleware('auth:api')->name('wallet');
    Route::get('/wallet/{id}', [WalletController::class, 'show'])->middleware('auth:api')->name('wallet');
    Route::put('/wallet/{id}', [WalletController::class, 'update'])->middleware('auth:api')->name('wallet');
    Route::delete('/wallet/{id}', [WalletController::class, 'destroy'])->middleware('auth:api')->name('wallet');
});
