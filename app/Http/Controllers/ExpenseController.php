<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ExpenseController extends Controller
{
    use ApiResponse;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $expense = Expense::orderBy('id','desc')->with('expenseCategory')->get();
        return $this->sendResponse($expense,'Expense  Return fetched successfully');
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
            'expense_category_id' => 'required',
            'date' => 'required',
            
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors(), 422);
        }
        $input = $request->all();
        $expense = Expense::create($input);
        return $this->sendResponse($expense, 'Expense created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $expense = Expense::with('expensecategory')->find($id);
        return $this->sendResponse($expense,'Expense  Return fetched successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $expense = Expense::with('expensecategory')->find($id);
        return $this->sendResponse($expense,'Expense  Return fetched successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $validator = Validator::make($request->all(), [
            'expense_category_id' => 'required',
            'date' => 'required',
            
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors(), 422);
        }
        $input = $request->all();
        $expense = Expense::find($id)->update($input);
        return $this->sendResponse($expense, 'Expense  created successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $expense = Expense::find($id)->delete();
        return $this->sendResponse($expense,'Expense  deleted successfully');
    }
}
