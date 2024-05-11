<?php

namespace App\Http\Controllers;

use App\Models\Withdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WithdrawalController extends Controller
{
    use ApiResponse;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $withdrawal= Withdrawal::with('customer')->get();
        return $this->sendResponse($withdrawal, 'withdrawal Return fetched successfully');
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
        $validator = Validator::make($request->all(),[
        'customer_id' => 'required',
        'deposit_amount' => 'required',
        'date' => 'required'
        ]);

        if($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors(), 422);
        }
        $input= $request->all();
        $withdrawl = Withdrawal::create($input);
        return $this->sendResponse($withdrawl, 'Withdrawal created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $withdrawal = Withdrawal::with('customer')->find($id);
        return $this->sendResponse($withdrawal, 'Withdrawal Type Return fetched successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'customer_id' => 'required',
            'deposit_amount' => 'required',
            'date' => 'required'
            ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors(), 422);
        }

        $input = $request->all();
        $withdrawal = Withdrawal::find($id)->update($input);
        return $this->sendResponse($withdrawal, 'Withdrawal updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $withdrawal = Withdrawal::find($id)->delete();
        return $this->sendResponse($withdrawal, 'Withdrawal deleted successfully!');
    }
}
