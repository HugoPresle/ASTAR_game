<?php

use App\Http\Controllers\MonsterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/startingAdventure',function(){
    return view('start');
});




Route::get('/register', function () {
    return view('register');
});
Route::post('/register', [PlayerController::class, 'create']);

Route::get('/login', function () {
    return view('login');
});
Route::post('/login', [PlayerController::class, 'login']);
Route::get('/logout', [PlayerController::class, 'logout']);
