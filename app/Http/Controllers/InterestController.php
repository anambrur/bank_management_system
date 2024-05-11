<?php

namespace App\Http\Controllers;

use App\Models\Interest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InterestController extends Controller
{
    use ApiResponse;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $interest = Interest::with('accountType')->get();
        return $this->sendResponse($interest, 'Interest Return fetched successfully');
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
            'account_type_id' => 'required',
            'interest_rate' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors(), 422);
        }

        $input = $request->all();
        $interest = Interest::create($input);
        return $this->sendResponse($interest, 'Interest created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Interest $interest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $interest = Interest::with('account_type')->find($id);
        return $this->sendResponse($interest, 'Interest Edit fetched successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'account_type_id' => 'required',
            'interest_rate' => 'required'
        ]);
        if ($validator->fails()) {
            return $this->sendError('validation Error.', $validator->errors(), 422);
        }
        $input = $request->all();
        $interest = Interest::find($id)->update($input);
        return $this->sendResponse($interest, 'Payment Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $interest = Interest::find($id)->delete();
        return $this->sendResponse($interest, ' Interest Delete successfully');
    }
}
