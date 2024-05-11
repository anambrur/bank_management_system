<?php

namespace App\Http\Controllers;

use App\Models\DepositType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DepositTypeController extends Controller
{

    use ApiResponse;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $DepositType = DepositType::get();
        return $this->sendResponse($DepositType,'Deposit Type Return Fetched Successfully');
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
            'deposit_type' => 'required'
            
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors(), 422);
        }
        $input = $request->all();
        $depositType = DepositType::create($input);
        return $this->sendResponse($depositType, 'Deposit Type created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(DepositType $depositType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $DepositType = DepositType::find($id);
        return $this->sendResponse($DepositType,'Deposit Type Return Fetched Successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,string $id)
    {
        $validator = Validator::make($request->all(), [
            'deposit_type' => 'required'
            
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors(), 422);
        }
        $input = $request->all();
        $DepositType = DepositType::find($id)->update($input);
        return $this->sendResponse($DepositType, 'Deposit Type Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $DepositType = DepositType::find($id)->delete();
        return $this->sendResponse($DepositType,'Deposit Type Deleted Successfully');
    }
}
