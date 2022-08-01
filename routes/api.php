<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::middleware(['json.accept'])->group(function() {
    Route::post('register', [AuthController::class, 'registration'])->name('register');
    Route::post('login', [AuthController::class, 'login'])->name('login');

    Route::middleware(['jwt.verify'])->group(function () {
        Route::post('refresh', [AuthController::class, 'refresh'])->name('refresh');
        Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    });

});
