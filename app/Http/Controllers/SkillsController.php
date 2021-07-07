<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\mSkill;

class SkillsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function listSkills()
    {
        $user = Auth::user();
        if($user->hasRole('Admin')){
            $skills = mSkill::get();
            return view('admin/qualifications/skills/list', ['skills' => $skills]);
        } else {
            return view('employees-dashboard');            
        }  
    }

    public function addSkills()
    {
        $user = Auth::user();
        if($user->hasRole('Admin')){
            return view('admin/qualifications/skills/add');
        } else {
            return view('employees-dashboard');            
        }
    }


    public function editSkills(Request $request, $id)
    {
        $user = Auth::user();
        if($user->hasRole('Admin')){
            $skills = mSkill::where('id', $id)->get();
            return view('admin/qualifications/skills/edit', ['skills' => $skills]);
        } else {
            return view('employees-dashboard');            
        }
    }

    public function deleteSkills($id)
    {
        $user = Auth::user();
        if($user->hasRole('Admin')){
            // $ids = explode(',', $id);
            // $skills = mSkill::destroy($ids);

            return redirect('/listSkills');
        } else {
            return view('employees-dashboard');            
        }
    }

    public function storeSkill(Request $request)
    {
        $user = Auth::user();
        if($user->hasRole('Admin')){

            $validated = $request->validate([
                'skill' => 'required|string|max:64',
                'skill_description' => 'string|max:255',
            ]);

            $skill = mSkill::create([
                'skill' => $request->skill,
                'skill_description' => $request->skill_description,
            ]);

            return redirect('/listSkills');
        } else {
            return view('employees-dashboard');            
        }

    }

    public function updateSkill(Request $request, $id)
    {
        $user = Auth::user();
        if($user->hasRole('Admin')){

            $validated = $request->validate([
                'skill' => 'required|string|max:64',
                'skill_description' => 'nullable|string|max:255',
            ]);

            $skill = mSkill::where('id', $id)->update([
                'skill'       => $request->skill,
                'skill_description'        => $request->skill_description,
            ]);

            return redirect('/listSkills');
        } else {
            return view('employees-dashboard');            
        }

    }
}
