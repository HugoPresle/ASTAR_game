<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlayerController;



Route::middleware(['auth.check'])->get('/', function () {
    return view('welcome');
});
/* LOGIN/REGISTER ROUTES */
    // GET VIEW 
    Route::get('/login', function () {
        return view('login');
    });

    Route::get('/register', function () {
        return view('register');
    });
    //function
    Route::post('/login', [PlayerController::class, 'login']);
    Route::get('/logout', [PlayerController::class, 'logout']);
    Route::post('/players', [PlayerController::class, 'create']);


