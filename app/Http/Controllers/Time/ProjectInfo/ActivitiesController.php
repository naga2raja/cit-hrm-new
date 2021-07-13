<?php

namespace App\Http\Controllers\Time\ProjectInfo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\mProject;
use App\tActivity;
use Auth;
use App\Session;

class ActivitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('time/project_info/projects/edit');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $activity = tActivity::create([
            'project_id' => $request->project_id,
            'activity_name' => (empty($request->activity_name) ? '' :  $request->activity_name),
        ]);
        return response()->json(['url'=> route('projects.edit', $request->project_id)]);               
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

    public function update_activity(Request $request)
    {
        $activity = tActivity::where('id', $request->activity_id)->update([
            'project_id' => $request->project_id,
            'activity_name' => (empty($request->activity_name) ? '' :  $request->activity_name)
        ]);

        return response()->json(['url'=> route('projects.edit', $request->project_id)]);
    }

    public function deleteMultiple(Request $request)
    {
        if($request->delete_ids) {
            tActivity::whereIn('id', $request->delete_ids)
                ->get()
                ->map(function($activity) {
                    $activity->delete();
                });
            return true;
        } else {  
            return false;
        }  
    }
}
