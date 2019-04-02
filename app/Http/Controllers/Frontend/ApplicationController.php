<?php

namespace App\Http\Controllers\Frontend;
use App\Models\Contact;
use App\Models\Portfolio;
use App\Models\About;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApplicationController extends FrontendController
{
    public function index(){

        $this->data('title', $this->makeTitle('home'));
        return view($this->_frontendpath.'.intro.pages.home.index', $this->data);
    }

    public function userLogin(Request $request){
        if($request->isMethod('get')){
//            $this->data('title', $this->makeTitle('login'));
            return redirect()->back();
        }
        if($request->isMethod('post')){
            $username=$request->name;
            $password=$request->pass;

            $remember=isset($request->remember)? true: false;

            if (Auth::guard('student')->attempt(['username' => $username, 'password' => $password])){
//                echo 'success';
                return redirect()->intended(route('home'))->with('success','Welcome'.' '.$username);
            }else{
                return redirect()->back()->with('error', 'Wrong username or password');
            }
        }
    }

    public function userLogout(){
        Auth::guard('student')->logout();
        $this->data('title', $this->makeTitle('logout'));
        return redirect()->intended(route('index'));
    }

}
