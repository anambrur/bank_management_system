<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DepositController extends Controller
{
    use ApiResponse;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Deposit = Deposit::orderBy('id','desc')->with('customer','depositType','interest')->get();
        // dd($Loan);
        return $this->sendResponse($Deposit,'Deposit Fetched Successfully');
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
            'deposit_type_id' => 'required',
            'interest_id' =>'required',
            'date' => 'required',
            'deposit_scheme' => 'required'
            
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors(), 422);
        }
        $input = $request->all();
        $deposit = Deposit::create($input);
        return $this->sendResponse($deposit, 'Deposit created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Deposit $deposit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // $Deposit = Deposit::find($id);
        $Deposit = Deposit::with('customer','depositType','interest')->find($id);
        return $this->sendResponse($Deposit,'Deposit Return Fetched Successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'customer_id' => 'required',
            'deposit_type_id' => 'required',
            'interest_id' =>'required',
            'date' => 'required',
            'deposit_scheme' => 'required'
            
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors(), 422);
        }
        $input = $request->all();
        $Deposit = Deposit::find($id)->update($input);
        return $this->sendResponse($Deposit, 'Deposit created successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Deposit = Deposit::find($id)->delete();
        return $this->sendResponse($Deposit,'Deposit Deleted Successfully');
    }
}
