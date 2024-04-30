<?php

namespace App\Http\Controllers;

use App\Models\AccountType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AccountTypeController extends Controller
{

    use ApiResponse;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $AccountType = AccountType::with('customer')->get();
        $AccountType = AccountType::get();
        // return response()->json(['status' => 200, 'data' => $AccountType, 'message' => 'Account Type Return fetched successfully']);
        return $this->sendResponse($AccountType,'Account Type Return fetched successfully');

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
            'account_type' => 'required'
            
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors(), 422);
        }
        $input = $request->all();
        $purchases = AccountType::create($input);
        return $this->sendResponse($purchases, 'Account Type created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(AccountType $accountType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $AccountType = AccountType::find($id);
        return $this->sendResponse($AccountType,'Account Type Return fetched successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'account_type' => 'required',
            
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors(), 422);
        }
        $input = $request->all();
        $AccountType = AccountType::find($id)->update($input);
        return $this->sendResponse($AccountType, 'Account Type updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $AccountType = AccountType::find($id)->delete();
        return $this->sendResponse($AccountType, 'Account Type deleted successfully!');
    }
}
