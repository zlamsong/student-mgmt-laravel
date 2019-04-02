<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends FrontendController
{
    public function login(Request $request){
        if($request->isMethod('get')){
//            $this->data('title', $this->makeTitle('login'));
            return view($this->_frontendpath.'login.login');
        }
        if($request->isMethod('post')){
            $email=$request->email;
            $password=$request->pass;

            $remember=isset($request->remember)? true: false;

            if (Auth::attempt((['email' => $email, 'password' => $password]))){
                return redirect()->intended(route('home'))->with('success','Welcome'.' '.$email);
            }else{
                return redirect()->back()->with('error', 'Wrong email or password');
            }
        }
    }

    public function logout(){
        Auth::logout();
        $this->data('title', $this->makeTitle('logout'));
        return redirect()->intended(route('login-admin'));
    }


}
