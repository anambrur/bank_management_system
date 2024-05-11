<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{
    use ApiResponse;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payment = Payment::with('customer')->get();
        return $this->sendResponse($payment, 'Payment Return fetched successfully');
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
            'date' => 'required',
            'amount' => 'required',
            'transaction_no' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->sendError('validation Error.', $validator->errors(), 422);
        }

        $input = $request->all();
        $payment = Payment::create($input);
        return $this->sendResponse($payment, 'Payment created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $payment = Payment::with('customer')->find($id);
        return $this->sendResponse($payment, 'Payment Edit fetched successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'customer_id' => 'required',
            'date' => 'required',
            'amount' => 'required',
            'transaction_no' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->sendError('validation Error.', $validator->errors(), 422);
        }

        $input = $request->all();
        $payment = Payment::find($id)->update($input);
        return $this->sendResponse($payment, 'Payment Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $payment = Payment::find($id)->delete();
        return $this->sendResponse($payment, 'Payment Delete successfully');
    }
}
