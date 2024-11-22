<?php

use App\Http\Controllers\UrlController;
use Illuminate\Support\Facades\Route;

Route::get('/items', [UrlController::class, 'index']);
Route::get('/items/{id}', [UrlController::class, 'show']);
