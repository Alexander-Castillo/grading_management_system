<?php

use App\Http\Controllers\Api\SectionController;
use App\Http\Controllers\Api\SpecialitiesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get('/specialities/{careerId}', [SpecialitiesController::class, 'getByCareer']);
Route::get('/sections/{careerId}', [SectionController::class, 'getBySpecialityAndCareer']);