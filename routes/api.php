<?php

use App\Http\Controllers\AccountTypeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DepositTypeController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\LoanProprosalController;
use App\Http\Controllers\LoanTypeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::resource('accountType',AccountTypeController::class)->names('accountType');
Route::resource('customer',CustomerController::class)->names('customer');
Route::resource('loanType',LoanTypeController::class)->names('loanType');
Route::resource('loan',LoanController::class)->names('loan');
Route::resource('depositType',DepositTypeController::class)->names('depositType');
Route::resource('loanProposal',LoanProprosalController::class)->names('loanProposal');
