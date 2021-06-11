<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use DB;
use Mail;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\Mail\VerifyMail;

use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
        // $this->middleware(['auth','verified']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);  
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        Log::info('Inside Register Controller');
        $user =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt(str_random(6)),
        ]);
    }

    public function register(Request $request)
    {
        Log::info($request);
        $input = $request->all();
        $validator = $this->validator($input);
        Log::info('Inside RegisterController -> register()');
        if ($validator->passes()){
            Log::info('inside validator');
            Log::info($emailParams->subject);
            $user = $this->create($input)->toArray(); 
            $user['link'] = str_random(30);
            $emailParams = new \stdClass(); //need to be explored
            $emailParams->usersEmail = $user['email'];
            $emailParams->usersName = $user['name'];
            $emailParams->link = $user['link'];
            $emailParams->subject = "Click activation code to activate account";

            DB::table('users_activations')->insert(['id_user' => $user['id'], 'token' => $user['link']]);
            Mail::to($emailParams->usersEmail)->send(new VerifyMail($emailParams));

            return redirect()->to('login')->with('Success', "Activation code sent to your email! ");
        }
        return back()->with('Error', $validator->errors());
    }

    public function userActivation($token)
    {
        Log::info('Inside RegisterController -> userActivation():');
        Log::info('$token', $token);
        $check = DB::table('users_activations')->where('token', $token)->first();
        if(!isnull($check)){
            $user = User::find($check->id_user);
            if($user->is_activated == 1){
                return redirect()->to('login')->with('Success', "User is already activated");
            }
            $user->update(['is_activated' => 1]);
            DB::table('users_activations')->where('token', $token)->delete();
            return redirect()->to('password/reset')->with('Success', "user actived successfully"); 
        }
        return redirect()->to('login')->with('warning', 'Your token is invalid');
    }

    /**
     * creating New Method verifyUser in RegisterController
     */
    /**
     * [verifyUser description]
     * @param  [type] $token [description]
     * @return [type]        [description]
     
    public function verifyUser($token)
    {
        Log::info('Inside RegisterController => verifyUser() :');

        $verifyUser = VerifyUser::where('token', $token)->first();
        if(isset($verifyUser)){
            $user = $verifyUser->user;
            
            if(!$user->verified){
                $verifyUser->user->verified = 1;
                $verifyUser->user->save();
                $status =  "Your E-mail is verified . You can Now LogIn.";
            } else{
                $status = "Your E-mail is already verified. You can now LogIn.";
            }

        } else{
            return redirect('/login')->with('warning', 'Sorry Your Email cannot be identified.');
        }

        return redirect('/login')->with('status', $status);
    }
    */
    /**
     * Modifying RegisterController.php and override the registered method from RegistersUsers
     */
    // public function registered(Request $request, $user)
    // {
    //     Log::info('Inside RegisterController => registered(): ');
    //     $this->guard()->logout();
    //     return redirect('/login')->with('status','We sent you an activation link. Check Your email and click on the link to verify.');
    // }
}
