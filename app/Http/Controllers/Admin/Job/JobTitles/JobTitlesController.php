<?php

namespace App\Http\Controllers\Admin\Job\JobTitles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use App\mJobTitle;
use App\Role;
use Session;
use DB;

class JobTitlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = mJobTitle::get();
        return view('admin/job/job_titles/list', ['jobs' => $jobs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        return view('admin/job/job_titles/add');
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
            'job_title' => 'required'
        ]);

        $user = mJobTitle::create([
            'name'  => $request->input('name'),
            'job_title' => $request->input('job_title'),
            'job_description' => $request->input('job_description'),
            'job_specification' => $request->input('job_specification'),
            'job_specification_filename' => $request->input('job_specification_filename'),            
            'note' => $request->input('note'),
        ]);

        return redirect()->route('jobTitles.index')->with('success', 'Job Titles Added successfully');
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
        $jobs = mJobTitle::find($id);
        return view('admin/job/job_titles/edit', ['jobs' => $jobs]);
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
            'job_title' => 'required'
        ]);

        $jobs = mJobTitle::find($id);
        $jobs->job_title = $request->input('job_title');
        $jobs->job_description = $request->input('job_description');
        $jobs->job_specification = $request->input('job_specification');
        $jobs->job_specification_filename = $request->input('job_specification_filename');
        $jobs->note = $request->input('note');
        $jobs->save();

        return redirect()->back()->with('success', 'Job Titles Updated successfully');
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
}
