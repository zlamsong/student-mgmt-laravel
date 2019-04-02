<?php

namespace App\Http\Controllers\Backend;
use App\Models\Privilege;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

use Illuminate\Http\Request;

class PrivilegeController extends BackendController
{
    public function index(){
        $this->data('privilegeData', Privilege::orderBy('id', 'DESC')->get());
        return view($this->_pagepath.'.privileges.privilege', $this->data);
    }

    public function addPrivilege(Request $request){
        if($request->isMethod('get')) return redirect()->back();
        if($request->isMethod('post')){
            $this->validate($request,[
                'privilege_name' => 'required|min:4|max:20|unique:privileges,privilege_name',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ]);
            $privilegeObject = new Privilege();
            $privilegeObject->privilege_name = $request->privilege_name;
            if ($privilegeObject->save()){

//                Mail::to('zlamsong22@gmail.com')->send(new test());

                return redirect()->route('privilege')->with('success','New privilege has bee successfully added.');
            }
        }
    }

    public function deletePrivilege($criteria){
        $id = $criteria;
        if (DB::table('privileges')->where('id','=', $id)->delete()){
            return redirect()->route('privilege')->with('success', 'privilege has been successfully deleted');
        }


    }

    public  function editPrivilege($id){
        $findData = Privilege::findOrFail($id);
        $this->data('privilegeData', $findData);
        return view($this->_pagepath.'privileges.editPrivilege', $this->data);
    }

    public function editPrivilegeAction(Request $request){
        if($request->isMethod('get')) return redirect()->back();
        if($request->isMethod('post')){
            $criteria = $request->criteria;
            $this->validate($request,[
                'privilege_name' => 'required|min:4|max:20|',[
                    Rule::unique('privileges','privilege_name')->ignore($criteria)
                ]
            ]);
            $privilegeObject = Privilege::findOrFail($criteria);
            $privilegeObject->privilege_name = $request->privilege_name;
            if ($privilegeObject->update()){
                return redirect()->route('privilege')->with('success','privilege has been successfully updated.');
            }
        }

    }

    public  function updatePrivilegeStatus(Request $request){
        if($request->isMethod('get')) return redirect()->back();
        if($request->isMethod('post')){
            $criteria = $request-> criteria;
            $privilegeObject = Privilege::findOrFail($criteria);

            if(isset($_POST['active'])){
                $message = 'status has been successfully di-activated';
                $privilegeObject->status = 0;
            }
            if(isset($_POST['inactive'])){
                $message = 'status has been successfully activated';
                $privilegeObject->status = 1;
            }
            if($privilegeObject->update()){
                return redirect()->route('privilege')->with('success', $message);
            }
        }

    }
}
