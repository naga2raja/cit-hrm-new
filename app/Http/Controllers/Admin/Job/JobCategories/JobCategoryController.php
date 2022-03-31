<?php

namespace App\Http\Controllers\Admin\Job\JobCategories;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use App\mJobCategory;
use Session;
use DB;

class JobCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = mJobCategory::get();
        return view('admin/job/job_categories/list', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/job/job_categories/add');
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
            'job_category' => 'required'
        ]);

        $job_category = mJobCategory::create([
            'name'  => $request->input('job_category')
        ]);

        return redirect()->route('jobCategory.index')->with('success', 'Job Category Added successfully');
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
        $job_category = mJobCategory::find($id);
        return view('admin/job/job_categories/edit', compact('job_category'));
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
            'name' => 'required'
        ]);

        $job_category = mJobCategory::find($id);
        $job_category->name = $request->input('name');
        $job_category->save();

        return redirect()->route('jobCategory.index')->with('success', 'Job Category Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function deleteMultiple(Request $request)
    {
        if($request->delete_ids) {
            mJobCategory::whereIn('id', $request->delete_ids)
                ->get()
                ->map(function($job_category) {
                    $job_category->delete();
                });
                
            return true;
        } else {   
            return false;
        }       
    }
}
