<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArtController;
use Illuminate\Support\Facades\Route;


Route::get('/', [ArtController::class, 'index']);

Route::middleware('auth')->group( function() {

    Route::get('/dashboard', [ArtController::class, 'dashboard']);
    Route::get('/dashboard/create', [ArtController::class, 'create']);
    Route::delete('/delete/{art}', [ArtController::class, 'destroy']);

    Route::post('/arts', [ArtController::class, 'store']);
    Route::delete('/logout', [AdminController::class, 'destroy']);
    
    Route::post('/logo', [ArtController::class, 'upload']);
});

Route::get('/login', [AdminController::class, 'create']);
Route::post('/login', [AdminController::class, 'store']);


