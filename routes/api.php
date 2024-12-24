<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\TransactionController;


// Route::prefix('v1')->group(function () {
//     // Auth Routes
//     Route::post('register', [AuthController::class, 'register']);
//     Route::post('login', [AuthController::class, 'login']);

//     Route::middleware(['auth:api'])->group(function () {
//         Route::post('logout', [AuthController::class, 'logout']);
//         Route::post('refresh', [AuthController::class, 'refresh']);

//         // Transaction Routes
//         Route::get('transactions', [TransactionController::class, 'index']);
//         Route::get('transactions/{id}', [TransactionController::class, 'show']);
//         Route::post('transactions', [TransactionController::class, 'store']);
//     });
// });


Route::group([
    'middleware' => 'api',
    'prefix' => 'v1'
], function ($router) {
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api')->name('logout');
    Route::post('/refresh', [AuthController::class, 'refresh'])->middleware('auth:api')->name('refresh');
    Route::get('/me', [AuthController::class, 'me'])->middleware('auth:api')->name('me');
    Route::post('/transactions', [TransactionController::class, 'store'])->middleware('auth:api')->name('transactions');
    Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions');
    Route::get('/transactions/{id}', [TransactionController::class, 'show'])->name('transactions');
});
