<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\WerkordersController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/werkorders', [WerkordersController::class, 'index'])->name('werkorders');
Route::get('/werkorders/nieuw', [WerkordersController::class, 'nieuw']);
Route::post('/f/CreateWerkorder', [WerkordersController::class, 'CreateWerkorder']);

