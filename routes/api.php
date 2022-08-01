<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::post('register', [AuthController::class, 'registration'])->name('register');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('refresh', [AuthController::class, 'refresh'])->name('refresh');

Route::middleware(['auth:api'])->group(function () {
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});
