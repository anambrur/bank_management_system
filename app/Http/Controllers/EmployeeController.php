<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    use ApiResponse;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employee = Employee::orderBy('id','desc')->with('employeeType')->get();
        return $this->sendResponse($employee,'Employee  Return fetched successfully');
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
            'employee_name' => 'required',
            'mobile' => 'required',
            'email' => 'required',
            'employee_type_id' => 'required',
            
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors(), 422);
        }
        $input = $request->all();
        $employee = Employee::create($input);
        return $this->sendResponse($employee, 'Employee created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $employee = Employee::with('employeeType')->find($id);
        return $this->sendResponse($employee,'Employee  Return fetched successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employee = Employee::with('employeeType')->find($id);
        return $this->sendResponse($employee,'Employee  Return fetched successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'employee_name' => 'required',
            'mobile' => 'required',
            'email' => 'required',
            'employee_type_id' => 'required',
            
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors(), 422);
        }
        $input = $request->all();
        $employee = Employee::find($id)->update($input);
        return $this->sendResponse($employee, 'Employee  created successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = Employee::find($id)->delete();
        return $this->sendResponse($employee,'Employee  deleted successfully');
    }
}
