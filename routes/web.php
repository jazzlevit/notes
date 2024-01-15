<?php

use Illuminate\Support\Facades\Route;
use Jazzlevit\Notes\Http\Controllers\NotesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('auth:therapist')->group(function () {
    // Notes
    Route::get('/', [NotesController::class, 'index'])
        ->name('index');
    Route::get('/{id}', [NotesController::class, 'show'])
        ->name('show');
    Route::post('/', [NotesController::class, 'create'])
        ->name('create');
    Route::delete('/{id}', [NotesController::class, 'destroy'])
        ->name('destroy');

});
