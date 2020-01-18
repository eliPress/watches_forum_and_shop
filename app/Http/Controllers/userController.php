<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\signInRequest;
use App\Http\Requests\signUpRequest;
use App\user;
use Session;
use Illuminate\Support\Facades\Hash;

class userController extends Controller {

    public static function showLoginForm() {
        self::$data['title'] .= 'Login';
        return view('forms/login', self::$data);
    }
    
    public static function showSignInForm(){
//        echo __METHOD__;
        self::$data['title'] .= 'Signin';
        return view('forms/signin', self::$data);
//        echo '<pre>';
//        print_r($request);

    }

    public static function validateUser(signInRequest $request) {
        if ($user = user::where('email', $request->email)->first()) {
            $user = $user->toArray();
//            dd($user['password']);
            
            if (Hash::check($request->password,$user['password'])) {
                Session::put('user_id',$user['id']);
                Session::put('user_name',$user['name']);
                Session::flash('sm',"welcome back {$user['name']}");
                if($user['role']==7){
                 Session::put('is_admin',true);

                }
             return redirect('/');
                // The passwords match...
            }else{
              #some wrong

            }
        }else{
            #some wrong
        }
    

//        echo $request->email;
//        echo '<hr>';
//        echo $request->password;
    }
    
    public static function validateNewUser(signUpRequest $request){
        if(User::saveUser($request)){
        Session::flash('sm',"welcome {$request['name']} you signed seccesfully please log in now");
        return redirect('user/login');

        }
    }

    


    public static function logOut(){
        Session::flush('user_id');
        Session::flush('is_admin');
//        Session:flush();
        return redirect('/');
    }
    
    
   
}
