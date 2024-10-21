<?php

use App\Http\Controllers\loginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
//calling the loginForm
Route::post('/login',[loginController::class, 'login']);