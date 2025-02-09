<?php


use Illuminate\Support\Facades\Route;

Route::name('merchant.')->group(function () {
    Route::get('/category/{category:slug}',\App\Http\Controllers\MerchantController::class)->name('category');
});
