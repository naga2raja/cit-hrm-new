<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Cookie;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request) {

        request()->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        
        $remember_me = $request->has('remember') ? true : false;
        $credentials = $request->only('email', 'password');
        if (auth()->attempt(['email' => $request->input('email'), 'password' => $request->input('password')], $remember_me))
        {
            if($remember_me) {
                setcookie('cit_login_user_name', base64_encode($request->input('email')), time()+30*24*60*60, "/"); //30 day
                setcookie('cit_login_password', base64_encode($request->input('password')), time()+30*24*60*60, "/"); //30 day
            }            
            // Authentication passed...
            return redirect('/home');
        }
        return redirect()->back()->withErrors(['email' => 'These credentials do not match our records.']);        
    }
}
