<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BranchController extends Controller
{
    use ApiResponse;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $branch = Branch::orderBy('id','desc')->get();
        return $this->sendResponse($branch,'Branch Return fetched successfully');
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
            'branch_name' => 'required',
            'address' => 'required',
            'asset' => 'required',
            'debt' => 'required'
            
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors(), 422);
        }
        $input = $request->all();
        $branchs = Branch::create($input);
        return $this->sendResponse($branchs, 'Branch created successfully!');;
    }

    /**
     * Display the specified resource.
     */
    public function show(Branch $branch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $branch = Branch::find($id);
        return $this->sendResponse($branch,'Branch Return fetched successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'branch_name' => 'required',
            'address' => 'required',
            'asset' => 'required',
            'debt' => 'required'
            
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors(), 422);
        }
        $input = $request->all();
        $branch = Branch::find($id)->update($input);
        return $this->sendResponse($branch, 'Branch Update successfully!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $branch = Branch::find($id)->delete();
        return $this->sendResponse($branch,'Branch Delete fetched successfully');
    }
}
