<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlayerController;



Route::middleware(['auth.check'])->get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/register', function () {
    return view('register');
});
Route::post('/register', [PlayerController::class, 'create']);

Route::get('/login', function () {
    return view('login');
});
Route::post('/login', [PlayerController::class, 'login']);
Route::get('/logout', [PlayerController::class, 'logout']);
