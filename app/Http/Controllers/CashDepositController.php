<?php

namespace App\Http\Controllers;

use App\Models\CashDeposit;
use App\Models\Deposit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CashDepositController extends Controller
{
    use ApiResponse;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cashDeposit = CashDeposit::with('customer')->get();
        return $this->sendResponse($cashDeposit, 'CashDeposit Return fetched successfully');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'customer_id' => 'required',
            'amount' => 'required',
            'date' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->sendError('validation Error.', $validator->errors(), 422);
        }

        $input = $request->all();
        $cashDeposit = CashDeposit::create($input);
        return $this->sendResponse($cashDeposit, 'CashDeposit created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(CashDeposit $cashDeposit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $deposit = Deposit::with('customer')->find($id);
        return $this->sendResponse($deposit, 'Cash Deposit Edit fetched successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(),[
            'customer_id' => 'required',
            'amount' => 'required',
            'date' => 'required'
        ]);
        if($validator->fails()) {
            return $this->sendError('validation Error.', $validator->errors(), 422);
        }
        $input = $request->all();
        $deposit = Deposit::find($id)->update($input);
        return $this->sendResponse($deposit, 'Payment Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cashDeposit = CashDeposit::find($id)->delete();
        return $this->sendResponse($cashDeposit, 'CashDeposit Delete successfully');
    }
}
