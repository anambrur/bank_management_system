<?php

namespace App\Http\Controllers;

use App\Models\ExpenseCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ExpenseCategoryController extends Controller
{
    use ApiResponse;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $expensecategory = ExpenseCategory::orderBy('id','desc')->get();
        return $this->sendResponse($expensecategory,'Expense Category Return fetched successfully');
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
            'expense' => 'required'
            
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors(), 422);
        }
        $input = $request->all();
        $expensecategory = ExpenseCategory::create($input);
        return $this->sendResponse($expensecategory, 'Expense Category created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(ExpenseCategory $expenseCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $expensecategory = ExpenseCategory::find($id);
        return $this->sendResponse($expensecategory,'Expense Category Return fetched successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'expense' => 'required'
            
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors(), 422);
        }
        $input = $request->all();
        $expensecategory = ExpenseCategory::find($id)->update($input);
        return $this->sendResponse($expensecategory, 'Expense Category created successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $expensecategory = ExpenseCategory::find($id)->delete();
        return $this->sendResponse($expensecategory, 'Expense Category deleted successfully!');
    }
}
