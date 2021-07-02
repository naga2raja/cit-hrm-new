<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileSettingsController extends Controller
{
    public function index() {
        return view('profile-settings');
    }

    public function changePassword(Request $request) {
        dd($request->all());
    }
}
