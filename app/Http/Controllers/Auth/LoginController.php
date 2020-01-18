<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use App\User;
use Illuminate\Support\Facades\Auth;

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
    
         public function redirectToProvider()
    {
           
        return Socialite::driver('facebook')->redirect();
    }
    
    
    public function handleProviderCallback()
    {
//        echo __METHOD__;
        $userSocial = Socialite::driver('facebook')->user();

//        return $user->name;
        $findUser= User::where('email',$userSocial->email)->first();
        if($findUser){
                    Auth::login($userSocial->email);
        return 'done with old';
        } else {
            
        $user = new User();
        $user->name= $userSocial->name;
        $user->email= $userSocial->email;
        $user->password= bcrypt(123456);
        $user->save();
        Auth::login($userSocial->email);
        return done;
       }
    }
}
