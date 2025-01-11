<?php

use App\Http\Controllers\Master\ItoController;
use App\Http\Controllers\Master\ItoTempController;
use Illuminate\Support\Facades\Route;

Route::prefix('master')->name('master.')->group(function () {
    Route::prefix('ito')->name('ito.')->group(function () {
        Route::get('/', [ItoController::class, 'index'])->name('index');
        Route::post('/upload', [ItoController::class, 'upload'])->name('upload');
        Route::post('/truncate-itotemp', [ItoController::class, 'truncateItoTemp'])->name('truncate-itotemp');
        Route::get('/itotemp-data', [ItoController::class, 'itotemp_data'])->name('itotemp-data');
    });
});
