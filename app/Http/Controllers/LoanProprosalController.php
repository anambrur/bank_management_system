<?php

namespace App\Http\Controllers;

use App\Models\LoanProprosal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoanProprosalController extends Controller
{

    use ApiResponse;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $LoanProposal = LoanProprosal::orderBy('id','desc')->with('loanType','customer')->get();
        return $this->sendResponse($LoanProposal,'Loan Proposal Fetched Successfully');
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
            'loan_type_id' => 'required',
            'amount' =>'required',
            'date' => 'required', 
            'tenure' => 'required',
            
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors(), 422);
        }
        $input = $request->all();
        $loanProposal = LoanProprosal::create($input);
        return $this->sendResponse($loanProposal, 'Loan Proposal created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(LoanProprosal $loanProprosal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $LoanProposal = LoanProprosal::find($id);
        return $this->sendResponse($LoanProposal,'Loan Proposal Fetched Successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'customer_id' => 'required',
            'loan_type_id' => 'required',
            'amount' =>'required',
            'date' => 'required', 
            'tenure' => 'required',
            
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors(), 422);
        }
        $input = $request->all();
        $LoanProposal = LoanProprosal::find($id)->update($input);
        return $this->sendResponse($LoanProposal, 'Loan Proposal Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $LoanProposal = LoanProprosal::find($id)->delete();
        return $this->sendResponse($LoanProposal,'Loan Proposal Deleted Successfully');
    }
}
