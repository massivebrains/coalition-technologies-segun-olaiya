<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CartController::class, 'index']);
Route::get('/cart', [CartController::class, 'cart']);
Route::post('/store', [CartController::class, 'store']);
