<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\OptionController;

Route::get('/', [ HomeController::class, 'index' ])->name('homepage');

Route::get('/list', [ HomeController::class, 'list' ])->name('list');

Route::get('/details/{id}', [ HomeController::class, 'details' ])->name('details');


Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('property', PropertyController::class)->except(['show']);

    Route::resource('option', OptionController::class)->except(['show']);
});

