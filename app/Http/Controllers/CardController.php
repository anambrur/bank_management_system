<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CardController extends Controller
{
    use ApiResponse;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // $data = Card::with('customer','cardType')->get();

        $Card = Card::orderBy('id', 'desc')->with('customer', 'cardType')->get();
        return $this->sendResponse($Card, 'Card Return fetched successfully');
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
            "customer_id" => 'required',
            "card_type_id" => 'required',
            "card_number" => 'required'
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors(), 422);
        }
        $input = $request->all();
        $card = Card::create($input);
        return $this->sendResponse($card, 'Card created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Card $card)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $Card = Card::find($id);
        return $this->sendResponse($Card, 'Card Type Return fetched successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validator = Validator::make($request->all(), [
            "customer_id" => 'required',
            "card_type_id" => 'required',
            "card_number" => 'required'
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors(), 422);
        }
        $input = $request->all();
        $card = Card::find($id)->update($input);
        return $this->sendResponse($card, 'Card created successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $Card = Card::find($id)->delete();
        return $this->sendResponse($Card, 'Card deleted successfully!');
    }
}
