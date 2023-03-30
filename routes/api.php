<?php

use Illuminate\Support\Facades\Route;

Route::middleware('apiVerify')->group(function () {
    Route::post('payment-transaction', [\App\Http\Controllers\PaymentController::class, 'process']);
    Route::post('sync', [\App\Http\Controllers\ExpenseController::class, 'sync']);
});
