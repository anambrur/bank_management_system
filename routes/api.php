<?php

use App\Http\Controllers\AccountTypeController;

use App\Http\Controllers\DepositController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeTypeController;
use App\Http\Controllers\ExpenseCategoryController;
use App\Http\Controllers\ExpenseController;

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DepositTypeController;
use App\Http\Controllers\InterestController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\LoanProprosalController;
use App\Http\Controllers\LoanTypeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::resource('accountType',AccountTypeController::class)->names('accountType');
Route::resource('expensecategory',ExpenseCategoryController::class)->names('expensecategory');
Route::resource('expense',ExpenseController::class)->names('expense');
Route::resource('employeeType',EmployeeTypeController::class)->names('employeeType');
Route::resource('employee',EmployeeController::class)->names('employee');
Route::resource('customer',CustomerController::class)->names('customer');
Route::resource('loanType',LoanTypeController::class)->names('loanType');
Route::resource('loan',LoanController::class)->names('loan');
Route::resource('depositType',DepositTypeController::class)->names('depositType');
Route::resource('deposit',DepositController::class)->names('deposit');
Route::resource('loanProposal',LoanProprosalController::class)->names('loanProposal');
Route::resource('interest',InterestController::class)->names('interest');
