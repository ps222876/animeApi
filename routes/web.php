<?php

use App\Http\Controllers\AnimeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/animes', [AnimeController::class, 'index']);
// Route::get('/animes/{id}', [AnimeController::class, 'show']);