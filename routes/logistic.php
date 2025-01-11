<?php

use App\Http\Controllers\Logistic\InventoryController;
use Illuminate\Support\Facades\Route;

Route::prefix('logistic')->name('logistic.')->group(function () {
    Route::prefix('inventories')->name('inventories.')->group(function () {
        Route::get('/', [InventoryController::class, 'index'])->name('index');
    });
});
