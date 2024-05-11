<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoanController extends Controller
{
    use ApiResponse;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Loan = Loan::orderBy('id','desc')->with('customer','loanType','loanProposal')->get();
        // dd($Loan);
        return $this->sendResponse($Loan,'Loan Return Fetched Successfully');
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
            'loan_proposal_id' =>'required',
            'amount' => 'required',
            'date' => 'required' 
            
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors(), 422);
        }
        $input = $request->all();
        $loan = Loan::create($input);
        return $this->sendResponse($loan, 'Loan created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Loan $loan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $Loan = Loan::find($id);
        return $this->sendResponse($Loan,'Loan Return Fetched Successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'customer_id' => 'required',
            'loan_type_id' => 'required',
            'loan_proposal_id' =>'required',
            'amount' => 'required',
            'date' => 'required' 
            
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors(), 422);
        }
        $input = $request->all();
        $Loan = Loan::find($id)->update($input);
        return $this->sendResponse($Loan, 'Loan Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Loan = Loan::find($id)->delete();
        return $this->sendResponse($Loan,'Loan Deleted Successfully');
    }
}
