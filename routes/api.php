<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasswordResetController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/forgot-password/send-otp', [PasswordResetController::class, 'sendOtp'])->name('password.send-otp');
Route::post('/forgot-password/verify-otp', [PasswordResetController::class, 'verifyOtp'])->name('password.verify');
Route::post('/forgot-password/reset', [PasswordResetController::class, 'resetPassword'])->name('password.reset');
