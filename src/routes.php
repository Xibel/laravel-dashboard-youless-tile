<?php

use Illuminate\Support\Facades\Route;
use Xibel\YoulessTile\Http\Controllers\YoulessController;

Route::get('/youless', [YoulessController::class, 'index'])->name('youless.index');