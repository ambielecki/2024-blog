<?php

use Illuminate\Support\Facades\Route;

Route::get('/{site}/home', [App\Http\Controllers\HomePageController::class, 'index']);
Route::get('/{site}/{pageType}', [App\Http\Controllers\PageController::class, 'index']);
