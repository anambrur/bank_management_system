<?php

namespace App\Http\Controllers;

use App\Models\CardType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CardTypeController extends Controller
{
    use ApiResponse;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $AccountType = AccountType::with('customer')->get();
        $CardType = CardType::get();
        // return response()->json(['status' => 200, 'data' => $AccountType, 'message' => 'Account Type Return fetched successfully']);
        return $this->sendResponse($CardType,'Card Type Return fetched successfully');
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
            'card_type' => 'required'
            
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors(), 422);
        }
        $input = $request->all();
        $purchases = CardType::create($input);
        return $this->sendResponse($purchases, 'Card Type created successfully!');
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CardType $cardType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $CardType = CardType::find($id);
        return $this->sendResponse($CardType,'Card Type Return fetched successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validator = Validator::make($request->all(), [
            'card_type' => 'required',
            
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors(), 422);
        }
        $input = $request->all();
        $CardType = CardType::find($id)->update($input);
        return $this->sendResponse($CardType, 'Card Type updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $CardType = CardType::find($id)->delete();
        return $this->sendResponse($CardType, 'Card Type deleted successfully!');
    }
}
