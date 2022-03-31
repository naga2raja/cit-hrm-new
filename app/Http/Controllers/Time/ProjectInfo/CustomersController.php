<?php

namespace App\Http\Controllers\Time\ProjectInfo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\mCustomer;
use Auth;
use App\Session;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = mCustomer::get();
        return view('time/project_info/customers/list', ['customers' => $customers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('time/project_info/customers/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|min:3|max:255',
            'customer_description' => 'nullable|string|max:255',
        ]);

        $customers = mCustomer::create([
            'customer_name' => $request->customer_name,
            'customer_description' => (empty($request->customer_description) ? '' :  $request->customer_description),
        ]);

        return redirect()->route('customers.index')->with('success', 'Customer added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customers = mCustomer::where('id', $id)->get();
        return view('time/project_info/customers/edit', ['customers' => $customers]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|min:3|max:255',
            'customer_description' => 'nullable|string|max:255',
        ]);

        $customer = mCustomer::where('id', $id)->update([
            'customer_name' => $request->customer_name,
            'customer_description' => (empty($request->customer_description) ? '' :  $request->customer_description),
        ]);

        // return redirect('/listSkills');
        return redirect()->route('customers.index')->with('success', 'Customer updated successfully'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public function deleteMultiple(Request $request)
    {
        if($request->delete_ids) {
            mCustomer::whereIn('id', $request->delete_ids)
                ->get()
                ->map(function($customer) {
                    $customer->delete();
                });
            return true;
        } else {  
            return false;
        }  
    }
}
