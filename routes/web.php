<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});
Route::middleware(['web'])->group(function () {
    Route::resource('products', ProductController::class);
});