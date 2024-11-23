<?php

use App\Http\Controllers\UrlController;
use Illuminate\Support\Facades\Route;

Route::get('/urls', [UrlController::class, 'index']);
Route::post('/urls', [UrlController::class, 'create']);
Route::delete('/urls', [UrlController::class, 'remove']);
