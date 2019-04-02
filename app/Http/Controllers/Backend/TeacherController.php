<?php

namespace App\Http\Controllers\Backend;

use App\Models\ClassOne;
use App\Models\Head;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class TeacherController extends BackendController
{
    public function index(){
        return view($this->_pagepath.'.teachers.addTeacher', $this->data);
    }

    public function addTeacher(Request $request){
        if($request->isMethod('get')) return redirect()->back();
        if($request->isMethod('post')){
            $this->validate($request,[
                'first_name'=>'required',
                'last_name'=>'required',
                'class'=>'required|unique:teachers,class_teacher_of',
                'upload' => 'required|mimes:jpeg,png,gif,jpg',
                'document' => 'required|max:10000|mimes:doc,pdf,docx,zip',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ]);
            $teacherObject = new Teacher();
            $teacherObject->first_name = $request->first_name;
            $teacherObject->last_name = $request->last_name;
            $teacherObject->class_teacher_of = $request->class;

            if ($request->hasFile('upload')) {
                $file = $request->file('upload');
                $ext = $file->getClientOriginalExtension();
                $imageName = str_random() . '.' . $ext;
                $UploadPath = public_path('lib/uploads/teachers/images/');

                if (!$file->move($UploadPath, $imageName)) return redirect()->back();
                $teacherObject->image = $imageName;
            }
            if ($request->hasFile('document')) {
                $file = $request->file('document');
                $ext = $file->getClientOriginalExtension();
                $fileName = str_random() . '.' . $ext;
                $UploadPath = public_path('lib/uploads/teachers/documents/');

                if (!$file->move($UploadPath, $fileName)) return redirect()->back();
                $teacherObject->document = $fileName;
            }
            if ($teacherObject->save()){
                return redirect()->route('show-teachers')->with('success','New teacher has been successfully added.');
            }
        }
    }

    public function showTeachers(){
        $this->data('teacherData', Teacher::orderBy('id', 'DESC')->get());
        $this->data('total', Teacher::count('id'));
//        $this->data('ext', Teacher::file('document')->getClientOriginalExtension()->get());
        return view($this->_pagepath.'.teachers.showTeachers', $this->data);
    }


    public function getDownload(Request $request){
        if($request->isMethod('get')){
            $criteria = $request-> criteria;
            $teacherObject = Teacher::findOrFail($criteria);
            $filename = $teacherObject->document;
            $file=  public_path('lib/uploads/teachers/documents/'.$filename);
            if (file_exists($file)){
                return response()->download($file);
            }else{
                exit('Requested file does not exist on our server!');
                //redirect to the other page to display not found
                // message if you want
            }
        }
    }

    public function deleteWithImage($criteria)
    {
        $id = $criteria;
        $findData = Teacher::findOrFail($id);
        $imageName = $findData->image;
        $deletePathOne = public_path('lib/uploads/teachers/images/' . $imageName);
        if (file_exists($deletePathOne) && is_file($deletePathOne)) {
            return unlink($deletePathOne);
        }
        return true;
    }

    public function deleteWithDocs($criteria)
    {
        $id = $criteria;
        $findData = Teacher::findOrFail($id);
        $docsName = $findData->document;
        $deletePathTwo = public_path('lib/uploads/teachers/documents/' . $docsName);
        if (file_exists($deletePathTwo) && is_file($deletePathTwo)) {
            return unlink($deletePathTwo);
        }
        return true;
    }

    public function deleteTeacher(Request $request)
    {
        $id = $request->id;
        DB::table('teachers')->where('class_teacher_of', '=', $id)->delete();
        $findData = Teacher::findOrFail($id);
        if ($this->deleteWithImage($id) && $this->deleteWithDocs($id) && $findData->delete()) {
            return redirect()->route('show-teachers')->with('success','teacher has been successfully removed.');
        }
    }

    public function editTeacher(Request $request)
    {
        $id = $request->id;
        $findData = Teacher::findOrFail($id);
        $this->data('teacherData', $findData);
        return view($this->_pagepath . 'teachers.editTeacher', $this->data);
    }

    public function editTeacherAction(Request $request){
        if ($request->isMethod('get')) return redirect()->back();
        if ($request->isMethod('post')) {
            $criteria = $request->criteria;
            $this->validate($request, [
                'class' => 'required|', [
                    Rule::unique('teachers', 'class_teacher_of')->ignore($criteria)
                ],
                'upload' => 'mimes:jpeg,png,gif,jpg',
                'document' => 'required|max:10000|mimes:doc,pdf,docx,zip',
            ]);
            $teacher = Teacher::findOrFail($criteria);
            $teacher->class_teacher_of = $request->class;

            if ($request->hasFile('upload')) {
                $file = $request->file('upload');
                $ext = $file->getClientOriginalExtension();
                $picName = str_random() . '.' . $ext;
                $UploadPath = public_path('lib/uploads/teachers/images/');

                if ($this->deleteWithImage($criteria) && $file->move($UploadPath, $picName)) {
                    $teacher->image = $picName;
                }
            }

            if ($request->hasFile('document')) {
                $file = $request->file('document');
                $ext = $file->getClientOriginalExtension();
                $fileName = str_random() . '.' . $ext;
                $UploadPath = public_path('lib/uploads/teachers/documents/');

                if ($this->deleteWithDocs($criteria) && $file->move($UploadPath, $fileName)) {
                    $teacher->document = $fileName;
                }
            }

            if ($teacher->update()) {
                return redirect()->route('show-teachers')->with('success', 'Info has been successfully updated');
            }
        }
    }




    public function head()
    {
        $this->data('headData', Head::orderBy('id', 'DESC')->get());
        return view($this->_pagepath.'.heads.head', $this->data);
    }


    public function addHead(Request $request){
        if($request->isMethod('get')) return redirect()->back();
        if($request->isMethod('post')){
            $this->validate($request,[
                'first_name'=>'required',
                'last_name'=>'required',
                'position'=>'required|unique:heads,position',
                'upload' => 'required|mimes:jpeg,png,gif,jpg',
                'document' => 'required|max:10000|mimes:doc,pdf,docx,zip',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ]);
            $headObject = new Head();
            $headObject->first_name = $request->first_name;
            $headObject->last_name = $request->last_name;
            $headObject->position = $request->position;

            if ($request->hasFile('upload')) {
                $file = $request->file('upload');
                $ext = $file->getClientOriginalExtension();
                $imageName = str_random() . '.' . $ext;
                $UploadPath = public_path('lib/uploads/heads/images/');

                if (!$file->move($UploadPath, $imageName)) return redirect()->back();
                $headObject->image = $imageName;
            }
            if ($request->hasFile('document')) {
                $file = $request->file('document');
                $ext = $file->getClientOriginalExtension();
                $fileName = str_random() . '.' . $ext;
                $UploadPath = public_path('lib/uploads/heads/documents/');

                if (!$file->move($UploadPath, $fileName)) return redirect()->back();
                $headObject->document = $fileName;
            }
            if ($headObject->save()){
                return redirect()->route('head')->with('success','successfully added.');
            }
        }
    }

    public function download(Request $request){
        if($request->isMethod('get')){
            $criteria = $request-> criteria;
            $headObject = Head::findOrFail($criteria);
            $filename = $headObject->document;
            $file=  public_path('lib/uploads/heads/documents/'.$filename);
            if (file_exists($file)){
                return response()->download($file);
            }else{
                exit('Requested file does not exist on our server!');
                //redirect to the other page to display not found
                // message if you want
            }
        }
    }

    public function deleteWithPicture($criteria)
    {
        $id = $criteria;
        $findData = Head::findOrFail($id);
        $imageName = $findData->image;
        $deletePathOne = public_path('lib/uploads/heads/images/' . $imageName);
        if (file_exists($deletePathOne) && is_file($deletePathOne)) {
            return unlink($deletePathOne);
        }
        return true;
    }

    public function deleteWithDocument($criteria)
    {
        $id = $criteria;
        $findData = Head::findOrFail($id);
        $docsName = $findData->document;
        $deletePathTwo = public_path('lib/uploads/heads/documents/' . $docsName);
        if (file_exists($deletePathTwo) && is_file($deletePathTwo)) {
            return unlink($deletePathTwo);
        }
        return true;
    }

    public function deleteHead(Request $request)
    {
        $id = $request->id;
        DB::table('heads')->where('position', '=', $id)->delete();
        $findData = Head::findOrFail($id);
        if ($this->deleteWithPicture($id) && $this->deleteWithDocument($id) && $findData->delete()) {
            return redirect()->route('head')->with('success','successfully removed.');
        }
    }


    public function editHead(Request $request)
    {
        $id = $request->id;
        $findData = Head::findOrFail($id);
        $this->data('headData', $findData);
        return view($this->_pagepath . 'heads.editHead', $this->data);
    }

    public function editHeadAction(Request $request){
        if ($request->isMethod('get')) return redirect()->back();
        if ($request->isMethod('post')) {
            $criteria = $request->criteria;
            $this->validate($request, [
                'upload' => 'mimes:jpeg,png,gif,jpg',
                'document' => 'required|max:10000|mimes:doc,pdf,docx,zip',
            ]);
            $head = Head::findOrFail($criteria);

            if ($request->hasFile('upload')) {
                $file = $request->file('upload');
                $ext = $file->getClientOriginalExtension();
                $picName = str_random() . '.' . $ext;
                $UploadPath = public_path('lib/uploads/heads/images/');

                if ($this->deleteWithPicture($criteria) && $file->move($UploadPath, $picName)) {
                    $head->image = $picName;
                }
            }

            if ($request->hasFile('document')) {
                $file = $request->file('document');
                $ext = $file->getClientOriginalExtension();
                $fileName = str_random() . '.' . $ext;
                $UploadPath = public_path('lib/uploads/heads/documents/');

                if ($this->deleteWithDocument($criteria) && $file->move($UploadPath, $fileName)) {
                    $head->document = $fileName;
                }
            }

            if ($head->update()) {
                return redirect()->route('head')->with('success', 'Info has been successfully updated');
            }
        }
    }
}
