<?php

namespace App\Http\Controllers\Backend;
use App\Models\Admin;
use App\Models\Privilege;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends BackendController
{
    public function index()
    {
        $this->data('adminsData', Admin::all());
        $this->data('title', $this->makeTitle('show-users'));
        return view($this->_pagepath . 'users.showUsers', $this->data);
    }


    public function addUser(Request $request)
    {
        if ($request->isMethod('get')) {
            $this->data('privilegeData', Privilege::where('status', '=', '1')->get()); //for showing only active privileges on privilege field of add user form

            $this->data('title', $this->makeTitle('add-user'));
            return view($this->_pagepath . '.users.addUsers', $this->data);
        }
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'name' => 'required',
                'username' => 'required|min:5|max:20|unique:admins,username',
                'email' => 'required|email|unique:admins,email',
                'password' => 'required|min:6|max:20|confirmed',
                'upload' => 'required|mimes:jpeg,png,gif,jpg'
            ]);
            $admin = new Admin();
            $admin->name = $request->name;
            $admin->username = $request->username;
            $admin->email = $request->email;
            $admin->password = bcrypt($request->password);

            if ($request->hasFile('upload')) {
                $file = $request->file('upload');
                $ext = $file->getClientOriginalExtension();
                $imageName = str_random() . '.' . $ext;
                $UploadPath = public_path('lib/uploads/users/');

                if (!$file->move($UploadPath, $imageName)) return redirect()->back();
                $admin->image = $imageName;
            }
            $privilegeId = $request->privilege;
            $totalprivilegeId = count($privilegeId);
            $increment = 0;
            if ($admin->save()) {
                $lastInsertId = $admin->id;

                foreach ($privilegeId as $id) {
                    $pri['admin_id'] = $lastInsertId;
                    $pri['privilege_id'] = $id;
                    $pri['created_at'] = Carbon::now()->toDateTimeString();
                    $pri['updated_at'] = Carbon::now()->toDateTimeString();

                    if (DB::table('manage_privilege')->insert($pri)) {
                        $increment++;
                    }
                    if ($totalprivilegeId == $increment) {

                        return redirect()->route('showUsers')->with('success', 'Users has been successfully added');
                    }
                }
            }


        }
    }

    public function editUser(Request $request)
    {
        $id = $request->id;
        $findData = Admin::findOrFail($id);
        $this->data('userData', $findData);
        return view($this->_pagepath . 'users.editUser', $this->data);

    }

    public function editUserAction(Request $request){
        if ($request->isMethod('get')) return redirect()->back();
        if ($request->isMethod('post')) {
            $criteria = $request->criteria;
            $this->validate($request, [
                'name' => 'required',
                'username' => 'required|min:5|max:20|', [
                    Rule::unique('admins', 'username')->ignore($criteria)
                ],
                'email' => 'required|email|', [
                    Rule::unique('admins', 'email')->ignore($criteria)
                ],
                'upload' => 'mimes:jpeg,png,gif,jpg'
            ]);
            $admin = Admin::findOrFail($criteria);
            $admin->name = $request->name;
            $admin->username = $request->username;
            $admin->email = $request->email;

            if ($request->hasFile('upload')) {
                $file = $request->file('upload');
                $ext = $file->getClientOriginalExtension();
                $imageName = str_random() . '.' . $ext;
                $UploadPath = public_path('lib/uploads/users/');

                if ($this->deleteWithFiles($criteria) && $file->move($UploadPath, $imageName)) {
                    $admin->image = $imageName;
                }
            }

            if ($admin->update()) {
                return redirect()->route('showUsers')->with('success', 'Info has been updated');
            }
        }
    }

    public function updateUserStatus(Request $request){
        if($request->isMethod('post')){
            $criteria = $request-> criteria;
            $adminObject = Admin::findOrFail($criteria);

            if(isset($_POST['active'])){
                $message = 'status has been successfully di-activated';
                $adminObject->status = 0;
            }
            if(isset($_POST['inactive'])){
                $message = 'status has been successfully activated';
                $adminObject->status = 1;
            }
            if($adminObject->update()){
                return redirect()->route('showUsers')->with('success', $message);
            }
        }
    }

    public function deleteWithFiles($criteria)
    {
        $id = $criteria;
        $findData = Admin::findOrFail($id);
        $fileName = $findData->image;
        $deletePath = public_path('lib/uploads/users/' . $fileName);
        if (file_exists($deletePath) && is_file($deletePath)) {
            return unlink($deletePath);
        }
        return true;

    }

    public function deleteUser(Request $request)
    {
        $id = $request->id;
        DB::table('manage_privilege')->where('admin_id', '=', $id)->delete();
        $findData = Admin::findOrFail($id);
        if ($this->deleteWithFiles($id) && $findData->delete()) {
            return redirect()->route('showUsers')->with('success', 'user has been successfully deleted');
        }

    }



    public function adminLogin(Request $request){
        if($request->isMethod('get')){
//            $this->data('title', $this->makeTitle('login-admin'));
            return view($this->_backendpath.'login.login');
        }
        if($request->isMethod('post')){
            $email=$request->email;
            $password=$request->pass;

            $remember=isset($request->remember)? true: false;


//            if (Auth::guard('web')->attempt((['email' => $email, 'password' => $password]))){
//                return redirect()->intended(route('dashboard'))->with('success','Welcome'.' '.$email);
//            }else{
//                return redirect()->back()->with('error', 'Wrong email or password');
//            }


            if (Auth::attempt((['email' => $email, 'password' => $password]))){
                return redirect()->intended(route('dashboard'))->with('success','Welcome'.' '.$email);
            }else{
                return redirect()->back()->with('error', 'Wrong email or password');
            }
        }
    }

    public function adminLogout(){
        Auth::logout();
        $this->data('title', $this->makeTitle('logout'));
        return redirect()->intended(route('login-admin'));
    }



}
