<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    use ApiResponse;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customer = Customer::get();
        return $this->sendResponse($customer, 'customer Return fetched successfully');
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
            'customer_name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'address' => 'required',
            'photo' => 'required',
            'nid_number' => 'required',
            'date_of_birth' => 'required',
            'nominee_name' => 'required',
            'nominee_mobile' => 'required',
            'nominee_nid_number' => 'required',
            'document' => 'required',
            'account_type_id' => 'required',
            'password' => 'required',

        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors(), 422);
        }
        if ($request->has('photo')) {
            $file = $request->file('photo');
            $imagename = $file->getClientOriginalName();
            $filename = time() . $imagename;
            $path = 'images/customer/';
            Storage::disk('public')->put($path . $filename, file_get_contents($file));
        }

        $input = $request->all();
        $customer_name = $request->customer_name;
        $email = $request->email;
        $mobile = $request->mobile;
        $address = $request->address;
        $nid_number = $request->nid_number;
        $date_of_birth = $request->date_of_birth;
        $nominee_name = $request->nominee_name;
        $nominee_mobile = $request->nominee_mobile;
        $nominee_nid_number = $request->nominee_nid_number;
        $document = $request->document;
        $account_type_id = $request->account_type_id;
        $password = $request->password;
        $photo = $path . $filename;
        // $designation ="customer";



        $customer = Customer::create(['customer_name' => $customer_name, 'email' => $email, 'mobile' => $mobile, 'address' => $address, 'nid_number' => $nid_number, 'date_of_birth' => $date_of_birth, 'nominee_name' => $nominee_name, 'nominee_mobile' => $nominee_mobile, 'nominee_nid_number' => $nominee_nid_number, 'document' => $document, 'account_type_id' => $account_type_id, 'password' => $password, 'photo' => $photo,]);

        User::create(['name' => $customer_name, 'email' => $email, 'password' => $password,]);
        return $this->sendResponse($customer, 'customer created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
