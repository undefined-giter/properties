<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\OptionController;

Route::get('/', [
    HomeController::class, 'index'
])->name('homepage');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('property', PropertyController::class)->except(['show']);

    Route::resource('option', OptionController::class)->except(['show']);
});

