<?php

use App\Http\Controllers\AccountTypeController;
use App\Http\Controllers\CashDepositController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InterestController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\WithdrawalController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::resource('accountType',AccountTypeController::class)->names('accountType');
Route::resource('customer',CustomerController::class)->names('customer');
Route::resource('withdrawal',WithdrawalController::class)->names('withdrawal');
Route::resource('cashDeposit',CashDepositController::class)->names('cashDeposit');
Route::resource('interest',InterestController::class)->names('interest');
Route::resource('payment',PaymentController::class)->names('payment');

