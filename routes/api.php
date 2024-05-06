<?php

use App\Http\Controllers\AccountTypeController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\CardTypeController;
use App\Http\Controllers\CustomerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::resource('accountType',AccountTypeController::class)->names('accountType');
Route::resource('customer',CustomerController::class)->names('customer');

Route::resource('cardType', CardTypeController::class)->names('cardType');
Route::resource('card', CardController::class)->names('card');
