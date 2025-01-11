<?php

use App\Http\Controllers\Site\DeliveryController;
use App\Http\Controllers\Site\InventoryController;
use Illuminate\Support\Facades\Route;

Route::prefix('site')->name('site.')->group(function () {
    Route::prefix('inventories')->name('inventories.')->group(function () {
        Route::get('/', [InventoryController::class, 'index'])->name('index');
    });

    Route::prefix('delivery')->name('delivery.')->group(function () {
        Route::get('/', [DeliveryController::class, 'index'])->name('index');
    });
});
