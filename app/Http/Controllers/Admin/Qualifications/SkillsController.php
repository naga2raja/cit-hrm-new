<?php

namespace App\Http\Controllers\Admin\Qualifications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\mSkill;
use Auth;
use App\Session;

class SkillsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $skills = mSkill::select('*');

        if($request->sort_by && $request->sort_field) {
            $skills = $skills->orderBy($request->sort_field, $request->sort_by);
        } else {
            $skills = $skills->orderBy('id', 'desc');
        }
        $total = $skills->count();
        $skills = $skills->paginate(10);        
        return view('admin/qualifications/skills/list', ['skills' => $skills, 'total' => $total]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/qualifications/skills/add');
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
            'skill' => 'required|string|max:64',
            'skill_description' => 'nullable|string|max:255',
        ]);

        $skill = mSkill::create([
            'skill' => $request->skill,
            'skill_description' => (empty($request->skill_description) ? '' :  $request->skill_description),
        ]);

        // return redirect('/listSkills');
        return redirect()->route('skills.index')->with('success', 'Skill added successfully');
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
        $skills = mSkill::where('id', $id)->get();
        return view('admin/qualifications/skills/edit', ['skills' => $skills]);
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
            'skill' => 'required|string|max:64',
            'skill_description' => 'nullable|string|max:255',
        ]);

        $skill = mSkill::where('id', $id)->update([
            'skill'       => $request->skill,
            'skill_description' => (empty($request->skill_description) ? '' :  $request->skill_description),
        ]);

        // return redirect('/listSkills');
        return redirect()->route('skills.index')->with('success', 'Skill updated successfully');  
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
            mSkill::whereIn('id', $request->delete_ids)
                ->get()
                ->map(function($skill) {
                    $skill->delete();
                });
            return true;
        } else {  
            return false;
        }  
    }
}
