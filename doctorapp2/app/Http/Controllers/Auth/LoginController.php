<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\User;

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
     * Overridden function
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
        $this->middleware('guest')->except('logout');
    }

    /**
     * Restricting Un-verified User Access
     * Modifying LoginController and override authenticated method from AuthenticatesUsers
     */
    /**
     
    public function authenticated(Request $request, $user)
    {
        if(!$user->verified){
            auth()->logout();
            return back()->with('warning', 'You need to confirm your account. we have sent you an activation link , plese check your Email');
        }
        return redirect()->intended($this->redirectPath());
    }*/

    public function credentials(Request $request)
    {
        $request['is_activated'] = 1;
        return $request->only('email', 'password', 'is_activated');
    }
}
