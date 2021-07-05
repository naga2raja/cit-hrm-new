<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;

class ProfileSettingsController extends Controller
{
    public function index() {
        return view('profile-settings');
    }

    public function changePassword(Request $request) {
        $validated = $request->validate([
            'current_password' => ['required', function ($attribute, $value, $fail) {
                if (!\Hash::check($value, Auth::user()->password)) {
                    return $fail(__('The current password is incorrect.'));
                }
            }],
            'new_password' => 'required|string|min:8',
            'confirm_password' => 'required|same:new_password',
        ]);

        $user_id = Auth::User()->id;                       
        $user = User::find($user_id);
        $user->password = \Hash::make($request->new_password);
        $user->save();
        return redirect()->route('profile-settings')->with('success', 'Password changed successfully');
    }
}