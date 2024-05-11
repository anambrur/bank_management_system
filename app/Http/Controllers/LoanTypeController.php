<?php

namespace App\Http\Controllers;

use App\Models\LoanType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoanTypeController extends Controller
{

    use ApiResponse;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $LoanType = LoanType::get();
        return $this->sendResponse($LoanType,'Loan Type Return Fetched Successfully');
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
            'loan_type' => 'required'
            
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors(), 422);
        }
        $input = $request->all();
        $loanType = LoanType::create($input);
        return $this->sendResponse($loanType, 'Loan Type created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(LoanType $loanType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $LoanType = LoanType::find($id);
        return $this->sendResponse($LoanType,'Loan Type Return Fetched Successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'loan_type' => 'required'
            
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors(), 422);
        }
        $input = $request->all();
        $LoanType = LoanType::find($id)->update($input);
        return $this->sendResponse($LoanType, 'Loan Type Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $LoanType = LoanType::find($id)->delete();
        return $this->sendResponse($LoanType,'Loan Type Deleted Successfully');
    }
}
