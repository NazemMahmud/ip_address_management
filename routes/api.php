<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IPAddressController;

Route::middleware(['json.accept'])->group(function() {
    Route::post('register', [AuthController::class, 'registration'])->name('register');
    Route::post('login', [AuthController::class, 'login'])->name('login');

    Route::middleware(['jwt.verify'])->group(function () {
        Route::post('logout', [AuthController::class, 'logout'])->name('logout');

        /** IP address manage related */
        Route::resource('ip', IPAddressController::class)->except([
            'create', 'edit', 'destroy'
        ]);
    });

});
