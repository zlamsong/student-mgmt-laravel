<?php

namespace App\Http\Controllers\Backend;

use App\Models\ClassEight;
use App\Models\ClassFive;
use App\Models\ClassFour;
use App\Models\ClassNine;
use App\Models\ClassOne;
use App\Models\ClassSeven;
use App\Models\ClassSix;
use App\Models\ClassTen;
use App\Models\ClassThree;
use App\Models\ClassTwo;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ClassController extends BackendController
{
    public function index(){
        $this->data('classOneData', ClassOne::orderBy('id', 'DESC')->get());
        $this->data('first', ClassOne::select('first_name', 'last_name')->where('roll_no', 1)->get());
        $this->data('second', ClassOne::select('first_name', 'last_name')->where('roll_no', 2)->get());
        $this->data('third', ClassOne::select('first_name', 'last_name')->where('roll_no', 3)->get());
        $this->data('total', ClassOne::count('id'));
        $this->data('teacher', Teacher::select('first_name','last_name')->where('class_teacher_of',1)->get());
        return view($this->_pagepath.'.classes.classOne.one', $this->data);
    }

    public function classOne(){
            return view($this->_pagepath . '.classes.classOne.student', $this->data);
    }

    public function addStudentOne(Request $request){
        if($request->isMethod('get')) return redirect()->back();
        if($request->isMethod('post')){
            $this->validate($request,[
                'first_name'=>'required',
                'last_name'=>'required',
                'roll_no'=>'required|numeric|unique:class_ones,roll_no',
                'DoB'=>'required|date_format:Y-m-d',
                'gender' => 'required',
                'contact'=>'required|numeric|phone',
                'parent_name'=>'required',
                'upload' => 'required|mimes:jpeg,png,gif,jpg',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ]);
            $classOneObject = new ClassOne();
            $classOneObject->first_name = $request->first_name;
            $classOneObject->last_name = $request->last_name;
            $classOneObject->roll_no = $request->roll_no;
            $classOneObject->DoB = $request->DoB;
            $classOneObject->gender = $request->gender;
            $classOneObject->contact = $request->contact;
            $classOneObject->parent_name = $request->parent_name;

            if ($request->hasFile('upload')) {
                $file = $request->file('upload');
                $ext = $file->getClientOriginalExtension();
                $imageName = str_random() . '.' . $ext;
                $UploadPath = public_path('lib/uploads/classes/classOne/');

                if (!$file->move($UploadPath, $imageName)) return redirect()->back();
                $classOneObject->image = $imageName;
            }
            if ($classOneObject->save()){
                return redirect()->route('classOneIndex')->with('success','New student has been successfully added.');
            }
        }
    }

    public function deleteWithFiles($criteria)
    {
        $id = $criteria;
        $findData = ClassOne::findOrFail($id);
        $fileName = $findData->image;
        $deletePath = public_path('lib/uploads/classes/classOne/' . $fileName);
        if (file_exists($deletePath) && is_file($deletePath)) {
            return unlink($deletePath);
        }
        return true;
    }

    public function deleteStudentOne(Request $request)
    {
        $id = $request->id;
        DB::table('class_ones')->where('roll_no', '=', $id)->delete();
        $findData = ClassOne::findOrFail($id);
        if ($this->deleteWithFiles($id) && $findData->delete()) {
            return redirect()->route('classOneIndex')->with('success','student has been successfully removed.');
        }
    }

    public function editStudent(Request $request)
    {
        $id = $request->id;
        $findData = ClassOne::findOrFail($id);
        $this->data('studentData', $findData);
        return view($this->_pagepath . 'classes.classOne.editStudent', $this->data);
    }

    public function editStudentAction(Request $request){
        if ($request->isMethod('get')) return redirect()->back();
        if ($request->isMethod('post')) {
            $criteria = $request->criteria;
            $this->validate($request, [
                'first_name' => 'required',
                'contact'=>'required|numeric|phone',
                'roll_no' => 'required|numeric|', [
                    Rule::unique('class_ones', 'roll_no')->ignore($criteria)
                ],
                'upload' => 'mimes:jpeg,png,gif,jpg',
            ]);
            $student = ClassOne::findOrFail($criteria);
           
            
            $student->contact = $request->contact;
            $student->roll_no = $request->roll_no;

            if ($request->hasFile('upload')) {
                $file = $request->file('upload');
                $ext = $file->getClientOriginalExtension();
                $imageName = str_random() . '.' . $ext;
                $UploadPath = public_path('lib/uploads/classes/classOne/');

                if ($this->deleteWithFiles($criteria) && $file->move($UploadPath, $imageName)) {
                    $student->image = $imageName;
                }
            }

            if ($student->update()) {
                return redirect()->route('classOneIndex')->with('success', 'student info successfully been updated');
            }
        }
    }
//<---------------------------/class one----------------------------->

    public function indexTwo(){
        $this->data('classTwoData', ClassTwo::orderBy('id', 'DESC')->get());
        $this->data('first', ClassTwo::select('first_name', 'last_name')->where('roll_no', 1)->get());
        $this->data('second', ClassTwo::select('first_name', 'last_name')->where('roll_no', 2)->get());
        $this->data('third', ClassTwo::select('first_name', 'last_name')->where('roll_no', 3)->get());
        $this->data('total', ClassTwo::count('id'));
        $this->data('teacher', Teacher::select('first_name','last_name')->where('class_teacher_of',2)->get());
        return view($this->_pagepath.'.classes.classTwo.two', $this->data);
    }

    public function classTwo(){
        return view($this->_pagepath . '.classes.classTwo.student', $this->data);
    }

    public function addStudentTwo(Request $request){
        if($request->isMethod('get')) return redirect()->back();
        if($request->isMethod('post')){
            $this->validate($request,[
                'first_name'=>'required',
                'last_name'=>'required',
                'roll_no'=>'required|numeric|unique:class_twos,roll_no',
                'DoB'=>'required|date_format:Y-m-d',
                'gender' => 'required',
                'contact'=>'required|numeric|phone',
                'parent_name'=>'required',
                'upload' => 'required|mimes:jpeg,png,gif,jpg',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ]);
            $classOneObject = new ClassTwo();
            $classOneObject->first_name = $request->first_name;
            $classOneObject->last_name = $request->last_name;
            $classOneObject->roll_no = $request->roll_no;
            $classOneObject->DoB = $request->DoB;
            $classOneObject->gender = $request->gender;
            $classOneObject->contact = $request->contact;
            $classOneObject->parent_name = $request->parent_name;

            if ($request->hasFile('upload')) {
                $file = $request->file('upload');
                $ext = $file->getClientOriginalExtension();
                $imageName = str_random() . '.' . $ext;
                $UploadPath = public_path('lib/uploads/classes/classTwo/');

                if (!$file->move($UploadPath, $imageName)) return redirect()->back();
                $classOneObject->image = $imageName;
            }
            if ($classOneObject->save()){
                return redirect()->route('classTwoIndex')->with('success','New student has been successfully added.');
            }
        }
    }

    public function deleteWithFilesTwo($criteria)
    {
        $id = $criteria;
        $findData = ClassTwo::findOrFail($id);
        $fileName = $findData->image;
        $deletePath = public_path('lib/uploads/classes/classTwo/' . $fileName);
        if (file_exists($deletePath) && is_file($deletePath)) {
            return unlink($deletePath);
        }
        return true;
    }

    public function deleteStudentTwo(Request $request)
    {
        $id = $request->id;
        DB::table('class_twos')->where('roll_no', '=', $id)->delete();
        $findData = ClassTwo::findOrFail($id);
        if ($this->deleteWithFilesTwo($id) && $findData->delete()) {
            return redirect()->route('classTwoIndex')->with('success','student has been successfully removed.');
        }
    }

    public function editStudentTwo(Request $request)
    {
        $id = $request->id;
        $findData = ClassTwo::findOrFail($id);
        $this->data('studentData', $findData);
        return view($this->_pagepath . 'classes.classTwo.editStudent', $this->data);
    }

    public function editStudentTwoAction(Request $request){
        if ($request->isMethod('get')) return redirect()->back();
        if ($request->isMethod('post')) {
            $criteria = $request->criteria;
            $this->validate($request, [
                'first_name' => 'required',
                'contact'=>'required|numeric|phone',
                'roll_no' => 'required|numeric|', [
                    Rule::unique('class_twos', 'roll_no')->ignore($criteria)
                ],
                'upload' => 'mimes:jpeg,png,gif,jpg',
            ]);
            $student = ClassTwo::findOrFail($criteria);


            $student->contact = $request->contact;
            $student->roll_no = $request->roll_no;

            if ($request->hasFile('upload')) {
                $file = $request->file('upload');
                $ext = $file->getClientOriginalExtension();
                $imageName = str_random() . '.' . $ext;
                $UploadPath = public_path('lib/uploads/classes/classTwo/');

                if ($this->deleteWithFilesTwo($criteria) && $file->move($UploadPath, $imageName)) {
                    $student->image = $imageName;
                }
            }

            if ($student->update()) {
                return redirect()->route('classTwoIndex')->with('success', 'student info successfully been updated');
            }
        }
    }
    //<---------------------------/class two----------------------------->


    public function indexThree(){
        $this->data('classThreeData', ClassThree::orderBy('id', 'DESC')->get());
        $this->data('first', ClassThree::select('first_name', 'last_name')->where('roll_no', 1)->get());
        $this->data('second', ClassThree::select('first_name', 'last_name')->where('roll_no', 2)->get());
        $this->data('third', ClassThree::select('first_name', 'last_name')->where('roll_no', 3)->get());
        $this->data('total', ClassThree::count('id'));
        $this->data('teacher', Teacher::select('first_name','last_name')->where('class_teacher_of',3)->get());
        return view($this->_pagepath.'.classes.classThree.three', $this->data);
    }

    public function classThree(){
        return view($this->_pagepath . '.classes.classThree.student', $this->data);
    }

    public function addStudentThree(Request $request){
        if($request->isMethod('get')) return redirect()->back();
        if($request->isMethod('post')){
            $this->validate($request,[
                'first_name'=>'required',
                'last_name'=>'required',
                'roll_no'=>'required|numeric|unique:class_threes,roll_no',
                'DoB'=>'required|date_format:Y-m-d',
                'gender' => 'required',
                'contact'=>'required|numeric|phone',
                'parent_name'=>'required',
                'upload' => 'required|mimes:jpeg,png,gif,jpg',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ]);
            $classOneObject = new ClassThree();
            $classOneObject->first_name = $request->first_name;
            $classOneObject->last_name = $request->last_name;
            $classOneObject->roll_no = $request->roll_no;
            $classOneObject->DoB = $request->DoB;
            $classOneObject->gender = $request->gender;
            $classOneObject->contact = $request->contact;
            $classOneObject->parent_name = $request->parent_name;

            if ($request->hasFile('upload')) {
                $file = $request->file('upload');
                $ext = $file->getClientOriginalExtension();
                $imageName = str_random() . '.' . $ext;
                $UploadPath = public_path('lib/uploads/classes/classThree/');

                if (!$file->move($UploadPath, $imageName)) return redirect()->back();
                $classOneObject->image = $imageName;
            }
            if ($classOneObject->save()){
                return redirect()->route('classThreeIndex')->with('success','New student has been successfully added.');
            }
        }
    }

    public function deleteWithFilesThree($criteria)
    {
        $id = $criteria;
        $findData = ClassThree::findOrFail($id);
        $fileName = $findData->image;
        $deletePath = public_path('lib/uploads/classes/classThree/' . $fileName);
        if (file_exists($deletePath) && is_file($deletePath)) {
            return unlink($deletePath);
        }
        return true;
    }

    public function deleteStudentThree(Request $request)
    {
        $id = $request->id;
        DB::table('class_threes')->where('roll_no', '=', $id)->delete();
        $findData = ClassThree::findOrFail($id);
        if ($this->deleteWithFilesThree($id) && $findData->delete()) {
            return redirect()->route('classThreeIndex')->with('success','student has been successfully removed.');
        }
    }

    public function editStudentThree(Request $request)
    {
        $id = $request->id;
        $findData = ClassThree::findOrFail($id);
        $this->data('studentData', $findData);
        return view($this->_pagepath . 'classes.classThree.editStudent', $this->data);
    }

    public function editStudentThreeAction(Request $request){
        if ($request->isMethod('get')) return redirect()->back();
        if ($request->isMethod('post')) {
            $criteria = $request->criteria;
            $this->validate($request, [
                'first_name' => 'required',
                'contact'=>'required|numeric|phone',
                'roll_no' => 'required|numeric|', [
                    Rule::unique('class_threes', 'roll_no')->ignore($criteria)
                ],
                'upload' => 'mimes:jpeg,png,gif,jpg',
            ]);
            $student = ClassThree::findOrFail($criteria);


            $student->contact = $request->contact;
            $student->roll_no = $request->roll_no;

            if ($request->hasFile('upload')) {
                $file = $request->file('upload');
                $ext = $file->getClientOriginalExtension();
                $imageName = str_random() . '.' . $ext;
                $UploadPath = public_path('lib/uploads/classes/classThree/');

                if ($this->deleteWithFilesThree($criteria) && $file->move($UploadPath, $imageName)) {
                    $student->image = $imageName;
                }
            }

            if ($student->update()) {
                return redirect()->route('classThreeIndex')->with('success', 'student info successfully been updated');
            }
        }
    }
    //<---------------------------/class three----------------------------->

    public function indexFour(){
        $this->data('classFourData', ClassFour::orderBy('id', 'DESC')->get());
        $this->data('first', ClassFour::select('first_name', 'last_name')->where('roll_no', 1)->get());
        $this->data('second', ClassFour::select('first_name', 'last_name')->where('roll_no', 2)->get());
        $this->data('third', ClassFour::select('first_name', 'last_name')->where('roll_no', 3)->get());
        $this->data('total', ClassFour::count('id'));
        $this->data('teacher', Teacher::select('first_name','last_name')->where('class_teacher_of',4)->get());
        return view($this->_pagepath.'.classes.classFour.four', $this->data);
    }

    public function classFour(){
        return view($this->_pagepath . '.classes.classFour.student', $this->data);
    }

    public function addStudentFour(Request $request){
        if($request->isMethod('get')) return redirect()->back();
        if($request->isMethod('post')){
            $this->validate($request,[
                'first_name'=>'required',
                'last_name'=>'required',
                'roll_no'=>'required|numeric|unique:class_fours,roll_no',
                'DoB'=>'required|date_format:Y-m-d',
                'gender' => 'required',
                'contact'=>'required|numeric|phone',
                'parent_name'=>'required',
                'upload' => 'required|mimes:jpeg,png,gif,jpg',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ]);
            $classOneObject = new ClassFour();
            $classOneObject->first_name = $request->first_name;
            $classOneObject->last_name = $request->last_name;
            $classOneObject->roll_no = $request->roll_no;
            $classOneObject->DoB = $request->DoB;
            $classOneObject->gender = $request->gender;
            $classOneObject->contact = $request->contact;
            $classOneObject->parent_name = $request->parent_name;

            if ($request->hasFile('upload')) {
                $file = $request->file('upload');
                $ext = $file->getClientOriginalExtension();
                $imageName = str_random() . '.' . $ext;
                $UploadPath = public_path('lib/uploads/classes/classFour/');

                if (!$file->move($UploadPath, $imageName)) return redirect()->back();
                $classOneObject->image = $imageName;
            }
            if ($classOneObject->save()){
                return redirect()->route('classFourIndex')->with('success','New student has been successfully added.');
            }
        }
    }

    public function deleteWithFilesFour($criteria)
    {
        $id = $criteria;
        $findData = ClassFour::findOrFail($id);
        $fileName = $findData->image;
        $deletePath = public_path('lib/uploads/classes/classFour/' . $fileName);
        if (file_exists($deletePath) && is_file($deletePath)) {
            return unlink($deletePath);
        }
        return true;
    }

    public function deleteStudentFour(Request $request)
    {
        $id = $request->id;
        DB::table('class_threes')->where('roll_no', '=', $id)->delete();
        $findData = ClassFour::findOrFail($id);
        if ($this->deleteWithFilesFour($id) && $findData->delete()) {
            return redirect()->route('classFourIndex')->with('success','student has been successfully removed.');
        }
    }

    public function editStudentFour(Request $request)
    {
        $id = $request->id;
        $findData = ClassFour::findOrFail($id);
        $this->data('studentData', $findData);
        return view($this->_pagepath . 'classes.classFour.editStudent', $this->data);
    }

    public function editStudentFourAction(Request $request){
        if ($request->isMethod('get')) return redirect()->back();
        if ($request->isMethod('post')) {
            $criteria = $request->criteria;
            $this->validate($request, [
                'first_name' => 'required',
                'contact'=>'required|numeric|phone',
                'roll_no' => 'required|numeric|', [
                    Rule::unique('class_threes', 'roll_no')->ignore($criteria)
                ],
                'upload' => 'mimes:jpeg,png,gif,jpg',
            ]);
            $student = ClassFour::findOrFail($criteria);


            $student->contact = $request->contact;
            $student->roll_no = $request->roll_no;

            if ($request->hasFile('upload')) {
                $file = $request->file('upload');
                $ext = $file->getClientOriginalExtension();
                $imageName = str_random() . '.' . $ext;
                $UploadPath = public_path('lib/uploads/classes/classFour/');

                if ($this->deleteWithFilesFour($criteria) && $file->move($UploadPath, $imageName)) {
                    $student->image = $imageName;
                }
            }

            if ($student->update()) {
                return redirect()->route('classFourIndex')->with('success', 'student info successfully been updated');
            }
        }
    }
    //<---------------------------/class four----------------------------->

    public function indexFive(){
        $this->data('classFiveData', ClassFive::orderBy('id', 'DESC')->get());
        $this->data('first', ClassFive::select('first_name', 'last_name')->where('roll_no', 1)->get());
        $this->data('second', ClassFive::select('first_name', 'last_name')->where('roll_no', 2)->get());
        $this->data('third', ClassFive::select('first_name', 'last_name')->where('roll_no', 3)->get());
        $this->data('total', ClassFive::count('id'));
        $this->data('teacher', Teacher::select('first_name','last_name')->where('class_teacher_of',5)->get());
        return view($this->_pagepath.'.classes.classFive.five', $this->data);
    }

    public function classFive(){
        return view($this->_pagepath . '.classes.classFive.student', $this->data);
    }

    public function addStudentFive(Request $request){
        if($request->isMethod('get')) return redirect()->back();
        if($request->isMethod('post')){
            $this->validate($request,[
                'first_name'=>'required',
                'last_name'=>'required',
                'roll_no'=>'required|numeric|unique:class_fives,roll_no',
                'DoB'=>'required|date_format:Y-m-d',
                'gender' => 'required',
                'contact'=>'required|numeric|phone',
                'parent_name'=>'required',
                'upload' => 'required|mimes:jpeg,png,gif,jpg',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ]);
            $classOneObject = new ClassFive();
            $classOneObject->first_name = $request->first_name;
            $classOneObject->last_name = $request->last_name;
            $classOneObject->roll_no = $request->roll_no;
            $classOneObject->DoB = $request->DoB;
            $classOneObject->gender = $request->gender;
            $classOneObject->contact = $request->contact;
            $classOneObject->parent_name = $request->parent_name;

            if ($request->hasFile('upload')) {
                $file = $request->file('upload');
                $ext = $file->getClientOriginalExtension();
                $imageName = str_random() . '.' . $ext;
                $UploadPath = public_path('lib/uploads/classes/classFive/');

                if (!$file->move($UploadPath, $imageName)) return redirect()->back();
                $classOneObject->image = $imageName;
            }
            if ($classOneObject->save()){
                return redirect()->route('classFiveIndex')->with('success','New student has been successfully added.');
            }
        }
    }

    public function deleteWithFilesFive($criteria)
    {
        $id = $criteria;
        $findData = ClassFive::findOrFail($id);
        $fileName = $findData->image;
        $deletePath = public_path('lib/uploads/classes/classFive/' . $fileName);
        if (file_exists($deletePath) && is_file($deletePath)) {
            return unlink($deletePath);
        }
        return true;
    }

    public function deleteStudentFive(Request $request)
    {
        $id = $request->id;
        DB::table('class_threes')->where('roll_no', '=', $id)->delete();
        $findData = ClassFive::findOrFail($id);
        if ($this->deleteWithFilesFour($id) && $findData->delete()) {
            return redirect()->route('classFiveIndex')->with('success','student has been successfully removed.');
        }
    }

    public function editStudentFive(Request $request)
    {
        $id = $request->id;
        $findData = ClassFive::findOrFail($id);
        $this->data('studentData', $findData);
        return view($this->_pagepath . 'classes.classFive.editStudent', $this->data);
    }

    public function editStudentFiveAction(Request $request){
        if ($request->isMethod('get')) return redirect()->back();
        if ($request->isMethod('post')) {
            $criteria = $request->criteria;
            $this->validate($request, [
                'first_name' => 'required',
                'contact'=>'required|numeric|phone',
                'roll_no' => 'required|numeric|', [
                    Rule::unique('class_fives', 'roll_no')->ignore($criteria)
                ],
                'upload' => 'mimes:jpeg,png,gif,jpg',
            ]);
            $student = ClassFive::findOrFail($criteria);


            $student->contact = $request->contact;
            $student->roll_no = $request->roll_no;

            if ($request->hasFile('upload')) {
                $file = $request->file('upload');
                $ext = $file->getClientOriginalExtension();
                $imageName = str_random() . '.' . $ext;
                $UploadPath = public_path('lib/uploads/classes/classFive/');

                if ($this->deleteWithFilesFive($criteria) && $file->move($UploadPath, $imageName)) {
                    $student->image = $imageName;
                }
            }

            if ($student->update()) {
                return redirect()->route('classFiveIndex')->with('success', 'student info successfully been updated');
            }
        }
    }
    //<---------------------------/class five----------------------------->

    public function indexSix(){
        $this->data('classSixData', ClassSix::orderBy('id', 'DESC')->get());
        $this->data('first', ClassSix::select('first_name', 'last_name')->where('roll_no', 1)->get());
        $this->data('second', ClassSix::select('first_name', 'last_name')->where('roll_no', 2)->get());
        $this->data('third', ClassSix::select('first_name', 'last_name')->where('roll_no', 3)->get());
        $this->data('total', ClassSix::count('id'));
        $this->data('teacher', Teacher::select('first_name','last_name')->where('class_teacher_of',6)->get());
        return view($this->_pagepath.'.classes.classSix.six', $this->data);
    }

    public function classSix(){
        return view($this->_pagepath . '.classes.classSix.student', $this->data);
    }

    public function addStudentSix(Request $request){
        if($request->isMethod('get')) return redirect()->back();
        if($request->isMethod('post')){
            $this->validate($request,[
                'first_name'=>'required',
                'last_name'=>'required',
                'roll_no'=>'required|numeric|unique:class_sixes,roll_no',
                'DoB'=>'required|date_format:Y-m-d',
                'gender' => 'required',
                'contact'=>'required|numeric|phone',
                'parent_name'=>'required',
                'upload' => 'required|mimes:jpeg,png,gif,jpg',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ]);
            $classOneObject = new ClassSix();
            $classOneObject->first_name = $request->first_name;
            $classOneObject->last_name = $request->last_name;
            $classOneObject->roll_no = $request->roll_no;
            $classOneObject->DoB = $request->DoB;
            $classOneObject->gender = $request->gender;
            $classOneObject->contact = $request->contact;
            $classOneObject->parent_name = $request->parent_name;

            if ($request->hasFile('upload')) {
                $file = $request->file('upload');
                $ext = $file->getClientOriginalExtension();
                $imageName = str_random() . '.' . $ext;
                $UploadPath = public_path('lib/uploads/classes/classSix/');

                if (!$file->move($UploadPath, $imageName)) return redirect()->back();
                $classOneObject->image = $imageName;
            }
            if ($classOneObject->save()){
                return redirect()->route('classSixIndex')->with('success','New student has been successfully added.');
            }
        }
    }

    public function deleteWithFilesSix($criteria)
    {
        $id = $criteria;
        $findData = ClassSix::findOrFail($id);
        $fileName = $findData->image;
        $deletePath = public_path('lib/uploads/classes/classSix/' . $fileName);
        if (file_exists($deletePath) && is_file($deletePath)) {
            return unlink($deletePath);
        }
        return true;
    }

    public function deleteStudentSix(Request $request)
    {
        $id = $request->id;
        DB::table('class_sixes')->where('roll_no', '=', $id)->delete();
        $findData = ClassSix::findOrFail($id);
        if ($this->deleteWithFilesSix($id) && $findData->delete()) {
            return redirect()->route('classSixIndex')->with('success','student has been successfully removed.');
        }
    }

    public function editStudentSix(Request $request)
    {
        $id = $request->id;
        $findData = ClassSix::findOrFail($id);
        $this->data('studentData', $findData);
        return view($this->_pagepath . 'classes.classSix.editStudent', $this->data);
    }

    public function editStudentSixAction(Request $request){
        if ($request->isMethod('get')) return redirect()->back();
        if ($request->isMethod('post')) {
            $criteria = $request->criteria;
            $this->validate($request, [
                'first_name' => 'required',
                'contact'=>'required|numeric|phone',
                'roll_no' => 'required|numeric|', [
                    Rule::unique('class_sixes', 'roll_no')->ignore($criteria)
                ],
                'upload' => 'mimes:jpeg,png,gif,jpg',
            ]);
            $student = ClassSix::findOrFail($criteria);


            $student->contact = $request->contact;
            $student->roll_no = $request->roll_no;

            if ($request->hasFile('upload')) {
                $file = $request->file('upload');
                $ext = $file->getClientOriginalExtension();
                $imageName = str_random() . '.' . $ext;
                $UploadPath = public_path('lib/uploads/classes/classSix/');

                if ($this->deleteWithFilesSix($criteria) && $file->move($UploadPath, $imageName)) {
                    $student->image = $imageName;
                }
            }

            if ($student->update()) {
                return redirect()->route('classSixIndex')->with('success', 'student info successfully been updated');
            }
        }
    }
    //<---------------------------/class six----------------------------->


    public function indexSeven(){
        $this->data('classSevenData', ClassSeven::orderBy('id', 'DESC')->get());
        $this->data('first', ClassSeven::select('first_name', 'last_name')->where('roll_no', 1)->get());
        $this->data('second', ClassSeven::select('first_name', 'last_name')->where('roll_no', 2)->get());
        $this->data('third', ClassSeven::select('first_name', 'last_name')->where('roll_no', 3)->get());
        $this->data('total', ClassSeven::count('id'));
        $this->data('teacher', Teacher::select('first_name','last_name')->where('class_teacher_of',7)->get());
        return view($this->_pagepath.'.classes.classSeven.seven', $this->data);
    }

    public function classSeven(){
        return view($this->_pagepath . '.classes.classSeven.student', $this->data);
    }

    public function addStudentSeven(Request $request){
        if($request->isMethod('get')) return redirect()->back();
        if($request->isMethod('post')){
            $this->validate($request,[
                'first_name'=>'required',
                'last_name'=>'required',
                'roll_no'=>'required|numeric|unique:class_sevens,roll_no',
                'DoB'=>'required|date_format:Y-m-d',
                'gender' => 'required',
                'contact'=>'required|numeric|phone',
                'parent_name'=>'required',
                'upload' => 'required|mimes:jpeg,png,gif,jpg',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ]);
            $classOneObject = new ClassSeven();
            $classOneObject->first_name = $request->first_name;
            $classOneObject->last_name = $request->last_name;
            $classOneObject->roll_no = $request->roll_no;
            $classOneObject->DoB = $request->DoB;
            $classOneObject->gender = $request->gender;
            $classOneObject->contact = $request->contact;
            $classOneObject->parent_name = $request->parent_name;

            if ($request->hasFile('upload')) {
                $file = $request->file('upload');
                $ext = $file->getClientOriginalExtension();
                $imageName = str_random() . '.' . $ext;
                $UploadPath = public_path('lib/uploads/classes/classSeven/');

                if (!$file->move($UploadPath, $imageName)) return redirect()->back();
                $classOneObject->image = $imageName;
            }
            if ($classOneObject->save()){
                return redirect()->route('classSevenIndex')->with('success','New student has been successfully added.');
            }
        }
    }

    public function deleteWithFilesSeven($criteria)
    {
        $id = $criteria;
        $findData = ClassSeven::findOrFail($id);
        $fileName = $findData->image;
        $deletePath = public_path('lib/uploads/classes/classSeven/' . $fileName);
        if (file_exists($deletePath) && is_file($deletePath)) {
            return unlink($deletePath);
        }
        return true;
    }

    public function deleteStudentSeven(Request $request)
    {
        $id = $request->id;
        DB::table('class_sevens')->where('roll_no', '=', $id)->delete();
        $findData = ClassSeven::findOrFail($id);
        if ($this->deleteWithFilesSeven($id) && $findData->delete()) {
            return redirect()->route('classSevenIndex')->with('success','student has been successfully removed.');
        }
    }

    public function editStudentSeven(Request $request)
    {
        $id = $request->id;
        $findData = ClassSeven::findOrFail($id);
        $this->data('studentData', $findData);
        return view($this->_pagepath . 'classes.classSeven.editStudent', $this->data);
    }

    public function editStudentSevenAction(Request $request){
        if ($request->isMethod('get')) return redirect()->back();
        if ($request->isMethod('post')) {
            $criteria = $request->criteria;
            $this->validate($request, [
                'first_name' => 'required',
                'contact'=>'required|numeric|phone',
                'roll_no' => 'required|numeric|', [
                    Rule::unique('class_sevens', 'roll_no')->ignore($criteria)
                ],
                'upload' => 'mimes:jpeg,png,gif,jpg',
            ]);
            $student = ClassSeven::findOrFail($criteria);


            $student->contact = $request->contact;
            $student->roll_no = $request->roll_no;

            if ($request->hasFile('upload')) {
                $file = $request->file('upload');
                $ext = $file->getClientOriginalExtension();
                $imageName = str_random() . '.' . $ext;
                $UploadPath = public_path('lib/uploads/classes/classSeven/');

                if ($this->deleteWithFilesSeven($criteria) && $file->move($UploadPath, $imageName)) {
                    $student->image = $imageName;
                }
            }

            if ($student->update()) {
                return redirect()->route('classSevenIndex')->with('success', 'student info successfully been updated');
            }
        }
    }
    //<---------------------------/class seven---------------------------->

    public function indexEight(){
        $this->data('classEightData', ClassEight::orderBy('id', 'DESC')->get());
        $this->data('first', ClassEight::select('first_name', 'last_name')->where('roll_no', 1)->get());
        $this->data('second', ClassEight::select('first_name', 'last_name')->where('roll_no', 2)->get());
        $this->data('third', ClassEight::select('first_name', 'last_name')->where('roll_no', 3)->get());
        $this->data('total', ClassEight::count('id'));
        $this->data('teacher', Teacher::select('first_name','last_name')->where('class_teacher_of',8)->get());
        return view($this->_pagepath.'.classes.classEight.eight', $this->data);
    }

    public function classEight(){
        return view($this->_pagepath . '.classes.classEight.student', $this->data);
    }

    public function addStudentEight(Request $request){
        if($request->isMethod('get')) return redirect()->back();
        if($request->isMethod('post')){
            $this->validate($request,[
                'first_name'=>'required',
                'last_name'=>'required',
                'roll_no'=>'required|numeric|unique:class_eights,roll_no',
                'DoB'=>'required|date_format:Y-m-d',
                'gender' => 'required',
                'contact'=>'required|numeric|phone',
                'parent_name'=>'required',
                'upload' => 'required|mimes:jpeg,png,gif,jpg',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ]);
            $classOneObject = new ClassEight();
            $classOneObject->first_name = $request->first_name;
            $classOneObject->last_name = $request->last_name;
            $classOneObject->roll_no = $request->roll_no;
            $classOneObject->DoB = $request->DoB;
            $classOneObject->gender = $request->gender;
            $classOneObject->contact = $request->contact;
            $classOneObject->parent_name = $request->parent_name;

            if ($request->hasFile('upload')) {
                $file = $request->file('upload');
                $ext = $file->getClientOriginalExtension();
                $imageName = str_random() . '.' . $ext;
                $UploadPath = public_path('lib/uploads/classes/classEight/');

                if (!$file->move($UploadPath, $imageName)) return redirect()->back();
                $classOneObject->image = $imageName;
            }
            if ($classOneObject->save()){
                return redirect()->route('classEightIndex')->with('success','New student has been successfully added.');
            }
        }
    }

    public function deleteWithFilesEight($criteria)
    {
        $id = $criteria;
        $findData = ClassEight::findOrFail($id);
        $fileName = $findData->image;
        $deletePath = public_path('lib/uploads/classes/classEight/' . $fileName);
        if (file_exists($deletePath) && is_file($deletePath)) {
            return unlink($deletePath);
        }
        return true;
    }

    public function deleteStudentEight(Request $request)
    {
        $id = $request->id;
        DB::table('class_eights')->where('roll_no', '=', $id)->delete();
        $findData = ClassEight::findOrFail($id);
        if ($this->deleteWithFilesEight($id) && $findData->delete()) {
            return redirect()->route('classEightIndex')->with('success','student has been successfully removed.');
        }
    }

    public function editStudentEight(Request $request)
    {
        $id = $request->id;
        $findData = ClassEight::findOrFail($id);
        $this->data('studentData', $findData);
        return view($this->_pagepath . 'classes.classEight.editStudent', $this->data);
    }

    public function editStudentEightAction(Request $request){
        if ($request->isMethod('get')) return redirect()->back();
        if ($request->isMethod('post')) {
            $criteria = $request->criteria;
            $this->validate($request, [
                'first_name' => 'required',
                'contact'=>'required|numeric|phone',
                'roll_no' => 'required|numeric|', [
                    Rule::unique('class_eights', 'roll_no')->ignore($criteria)
                ],
                'upload' => 'mimes:jpeg,png,gif,jpg',
            ]);
            $student = ClassEight::findOrFail($criteria);


            $student->contact = $request->contact;
            $student->roll_no = $request->roll_no;

            if ($request->hasFile('upload')) {
                $file = $request->file('upload');
                $ext = $file->getClientOriginalExtension();
                $imageName = str_random() . '.' . $ext;
                $UploadPath = public_path('lib/uploads/classes/classEight/');

                if ($this->deleteWithFilesEight($criteria) && $file->move($UploadPath, $imageName)) {
                    $student->image = $imageName;
                }
            }

            if ($student->update()) {
                return redirect()->route('classEightIndex')->with('success', 'student info successfully been updated');
            }
        }
    }
    //<---------------------------/class eight---------------------------->

    public function indexNine(){
        $this->data('classNineData', ClassNine::orderBy('id', 'DESC')->get());
        $this->data('first', ClassNine::select('first_name', 'last_name')->where('roll_no', 1)->get());
        $this->data('second', ClassNine::select('first_name', 'last_name')->where('roll_no', 2)->get());
        $this->data('third', ClassNine::select('first_name', 'last_name')->where('roll_no', 3)->get());
        $this->data('total', ClassNine::count('id'));
        $this->data('teacher', Teacher::select('first_name','last_name')->where('class_teacher_of',9)->get());
        return view($this->_pagepath.'.classes.classNine.nine', $this->data);
    }

    public function classNine(){
        return view($this->_pagepath . '.classes.classNine.student', $this->data);
    }

    public function addStudentNine(Request $request){
        if($request->isMethod('get')) return redirect()->back();
        if($request->isMethod('post')){
            $this->validate($request,[
                'first_name'=>'required',
                'last_name'=>'required',
                'roll_no'=>'required|numeric|unique:class_nines,roll_no',
                'DoB'=>'required|date_format:Y-m-d',
                'gender' => 'required',
                'contact'=>'required|numeric|phone',
                'parent_name'=>'required',
                'upload' => 'required|mimes:jpeg,png,gif,jpg',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ]);
            $classOneObject = new ClassNine();
            $classOneObject->first_name = $request->first_name;
            $classOneObject->last_name = $request->last_name;
            $classOneObject->roll_no = $request->roll_no;
            $classOneObject->DoB = $request->DoB;
            $classOneObject->gender = $request->gender;
            $classOneObject->contact = $request->contact;
            $classOneObject->parent_name = $request->parent_name;

            if ($request->hasFile('upload')) {
                $file = $request->file('upload');
                $ext = $file->getClientOriginalExtension();
                $imageName = str_random() . '.' . $ext;
                $UploadPath = public_path('lib/uploads/classes/classNine/');

                if (!$file->move($UploadPath, $imageName)) return redirect()->back();
                $classOneObject->image = $imageName;
            }
            if ($classOneObject->save()){
                return redirect()->route('classNineIndex')->with('success','New student has been successfully added.');
            }
        }
    }

    public function deleteWithFilesNine($criteria)
    {
        $id = $criteria;
        $findData = ClassNine::findOrFail($id);
        $fileName = $findData->image;
        $deletePath = public_path('lib/uploads/classes/classNine/' . $fileName);
        if (file_exists($deletePath) && is_file($deletePath)) {
            return unlink($deletePath);
        }
        return true;
    }

    public function deleteStudentNine(Request $request)
    {
        $id = $request->id;
        DB::table('class_nines')->where('roll_no', '=', $id)->delete();
        $findData = ClassNine::findOrFail($id);
        if ($this->deleteWithFilesNine($id) && $findData->delete()) {
            return redirect()->route('classNineIndex')->with('success','student has been successfully removed.');
        }
    }

    public function editStudentNine(Request $request)
    {
        $id = $request->id;
        $findData = ClassNine::findOrFail($id);
        $this->data('studentData', $findData);
        return view($this->_pagepath . 'classes.classNine.editStudent', $this->data);
    }

    public function editStudentNineAction(Request $request){
        if ($request->isMethod('get')) return redirect()->back();
        if ($request->isMethod('post')) {
            $criteria = $request->criteria;
            $this->validate($request, [
                'first_name' => 'required',
                'contact'=>'required|numeric|phone',
                'roll_no' => 'required|numeric|', [
                    Rule::unique('class_nines', 'roll_no')->ignore($criteria)
                ],
                'upload' => 'mimes:jpeg,png,gif,jpg',
            ]);
            $student = ClassNine::findOrFail($criteria);


            $student->contact = $request->contact;
            $student->roll_no = $request->roll_no;

            if ($request->hasFile('upload')) {
                $file = $request->file('upload');
                $ext = $file->getClientOriginalExtension();
                $imageName = str_random() . '.' . $ext;
                $UploadPath = public_path('lib/uploads/classes/classNine/');

                if ($this->deleteWithFilesNine($criteria) && $file->move($UploadPath, $imageName)) {
                    $student->image = $imageName;
                }
            }

            if ($student->update()) {
                return redirect()->route('classNineIndex')->with('success', 'student info successfully been updated');
            }
        }
    }
    //<---------------------------/class nine---------------------------->

    public function indexTen(){
        $this->data('classTenData', ClassTen::orderBy('id', 'DESC')->get());
        $this->data('first', ClassTen::select('first_name', 'last_name')->where('roll_no', 1)->get());
        $this->data('second', ClassTen::select('first_name', 'last_name')->where('roll_no', 2)->get());
        $this->data('third', ClassTen::select('first_name', 'last_name')->where('roll_no', 3)->get());
        $this->data('total', ClassTen::count('id'));
        $this->data('teacher', Teacher::select('first_name','last_name')->where('class_teacher_of',10)->get());
        return view($this->_pagepath.'.classes.classTen.ten', $this->data);
    }

    public function classTen(){
        return view($this->_pagepath . '.classes.classTen.student', $this->data);
    }

    public function addStudentTen(Request $request){
        if($request->isMethod('get')) return redirect()->back();
        if($request->isMethod('post')){
            $this->validate($request,[
                'first_name'=>'required',
                'last_name'=>'required',
                'roll_no'=>'required|numeric|unique:class_tens,roll_no',
                'DoB'=>'required|date_format:Y-m-d',
                'gender' => 'required',
                'contact'=>'required|numeric|phone',
                'parent_name'=>'required',
                'upload' => 'required|mimes:jpeg,png,gif,jpg',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ]);
            $classOneObject = new ClassTen();
            $classOneObject->first_name = $request->first_name;
            $classOneObject->last_name = $request->last_name;
            $classOneObject->roll_no = $request->roll_no;
            $classOneObject->DoB = $request->DoB;
            $classOneObject->gender = $request->gender;
            $classOneObject->contact = $request->contact;
            $classOneObject->parent_name = $request->parent_name;

            if ($request->hasFile('upload')) {
                $file = $request->file('upload');
                $ext = $file->getClientOriginalExtension();
                $imageName = str_random() . '.' . $ext;
                $UploadPath = public_path('lib/uploads/classes/classTen/');

                if (!$file->move($UploadPath, $imageName)) return redirect()->back();
                $classOneObject->image = $imageName;
            }
            if ($classOneObject->save()){
                return redirect()->route('classTenIndex')->with('success','New student has been successfully added.');
            }
        }
    }

    public function deleteWithFilesTen($criteria)
    {
        $id = $criteria;
        $findData = ClassTen::findOrFail($id);
        $fileName = $findData->image;
        $deletePath = public_path('lib/uploads/classes/classTen/' . $fileName);
        if (file_exists($deletePath) && is_file($deletePath)) {
            return unlink($deletePath);
        }
        return true;
    }

    public function deleteStudentTen(Request $request)
    {
        $id = $request->id;
        DB::table('class_tens')->where('roll_no', '=', $id)->delete();
        $findData = ClassTen::findOrFail($id);
        if ($this->deleteWithFilesTen($id) && $findData->delete()) {
            return redirect()->route('classTenIndex')->with('success','student has been successfully removed.');
        }
    }

    public function editStudentTen(Request $request)
    {
        $id = $request->id;
        $findData = ClassTen::findOrFail($id);
        $this->data('studentData', $findData);
        return view($this->_pagepath . 'classes.classTen.editStudent', $this->data);
    }

    public function editStudentTenAction(Request $request){
        if ($request->isMethod('get')) return redirect()->back();
        if ($request->isMethod('post')) {
            $criteria = $request->criteria;
            $this->validate($request, [
                'first_name' => 'required',
                'contact'=>'required|numeric|phone',
                'roll_no' => 'required|numeric|', [
                    Rule::unique('class_tens', 'roll_no')->ignore($criteria)
                ],
                'upload' => 'mimes:jpeg,png,gif,jpg',
            ]);
            $student = ClassTen::findOrFail($criteria);


            $student->contact = $request->contact;
            $student->roll_no = $request->roll_no;

            if ($request->hasFile('upload')) {
                $file = $request->file('upload');
                $ext = $file->getClientOriginalExtension();
                $imageName = str_random() . '.' . $ext;
                $UploadPath = public_path('lib/uploads/classes/classTen/');

                if ($this->deleteWithFilesTen($criteria) && $file->move($UploadPath, $imageName)) {
                    $student->image = $imageName;
                }
            }

            if ($student->update()) {
                return redirect()->route('classTenIndex')->with('success', 'student info successfully been updated');
            }
        }
    }
    //<---------------------------/class ten---------------------------->
}
