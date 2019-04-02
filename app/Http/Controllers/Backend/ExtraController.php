<?php

namespace App\Http\Controllers\Backend;

use App\Models\History;
use App\Models\Reader;
use App\Models\Student;
use App\Models\Testimonial;
use App\Models\Tuition;
use App\Models\Why;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Nexmo\Client\Exception\Validation;
use App\Http\Controllers\Controller;

class ExtraController extends BackendController
{
    public function history(){
        $this->data('historyData', History::orderBy('id', 'DESC')->paginate(1));
        return view($this->_pagepath.'history.history', $this->data);
    }

    public function addHistory(Request $request){
        if($request->isMethod('get')) return redirect()->back();
        if($request->isMethod('post')){
            $this->validate($request,[
                'history' => 'required',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ]);
            $historyObject = new History();
            $historyObject->desc = $request->history;

            if ($historyObject->save()){
                return redirect()->route('history')->with('success','New history has been successfully added.');
            }
        }
    }

    public function deleteHistory($criteria)
    {
        $id = $criteria;
        if (DB::table('histories')->where('id','=', $id)->delete()){
            return redirect()->route('history')->with('success', 'History has been successfully deleted');
        }

    }

    public function why(){
        $this->data('whyData', Why::orderBy('id', 'DESC')->paginate(3));
        return view($this->_pagepath.'whyUs.why', $this->data);
    }

    public function addWhy(Request $request){
        if($request->isMethod('get')) return redirect()->back();
        if($request->isMethod('post')){
            $this->validate($request,[
                'topic' => 'required|min:10|max:1000|unique:whies,topic',
                'description' => 'required|required|min:5|max:5000',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ]);
            $whyObject = new Why();
            $whyObject->topic = $request->topic;
            $whyObject->desc = $request->description;

            if ($whyObject->save()){
                return redirect()->route('why-us')->with('success','New topic has been successfully added.');
            }
        }
    }

    public function deleteWhy($criteria)
    {
        $id = $criteria;
        if (DB::table('whies')->where('id','=', $id)->delete()){
            return redirect()->route('why-us')->with('success', 'Topic has been successfully deleted');
        }
    }

    public function tuition(){
        $this->data('tuitionData', Tuition::orderBy('id', 'DESC')->paginate(1));
        return view($this->_pagepath.'tuition.tuition', $this->data);
    }

    public function addTuition(Request $request){
        if($request->isMethod('get')) return redirect()->back();
        if($request->isMethod('post')){
            $this->validate($request,[
                'subject'=>'required',
                'class'=>'required',
                'upload' => 'required|mimes:jpeg,png,gif,jpg',
                'time'=>'required',
                'first_date' => 'required',
                'second_date' => 'required',
                'description' => 'required|min:20|max:10000',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ]);
            $tuitionObject = new Tuition();
            $tuitionObject->subject = $request->subject;
            $tuitionObject->class = $request->class;

            if ($request->hasFile('upload')) {
                $file = $request->file('upload');
                $ext = $file->getClientOriginalExtension();
                $imageName = str_random() . '.' . $ext;
                $UploadPath = public_path('lib/uploads/tuition/images/');

                if (!$file->move($UploadPath, $imageName)) return redirect()->back();
                $tuitionObject->image = $imageName;
            }
            $tuitionObject->time = $request->time;
            $tuitionObject->from = $request->first_date;
            $tuitionObject->to = $request->second_date;
            $tuitionObject->desc = $request->description;



            if ($tuitionObject->save()){
                return redirect()->route('tuition')->with('success','Tuition class has been successfully published.');
            }
        }
    }

    public function deleteWithImage($criteria)
    {
        $id = $criteria;
        $findData = Tuition::findOrFail($id);
        $imageName = $findData->image;
        $deletePathOne = public_path('lib/uploads/tuition/images/' . $imageName);
        if (file_exists($deletePathOne) && is_file($deletePathOne)) {
            return unlink($deletePathOne);
        }
        return true;
    }

    public function deleteTuition(Request $request)
    {
        $id = $request->id;
        DB::table('tuitions')->where('subject', '=', $id)->delete();
        $findData = Tuition::findOrFail($id);
        if ($this->deleteWithImage($id) && $findData->delete()) {
            return redirect()->route('tuition')->with('success','tuition class has been successfully removed.');
        }
    }

    public function showStudents(){
        $this->data('tuitionData', Reader::orderBy('subject', 'DESC')->get());
        return view($this->_pagepath.'tuition.showReaders', $this->data);
    }

    public function deleteTuitionStudent($criteria)
    {
        $id = $criteria;
        if (DB::table('readers')->where('id','=', $id)->delete()){
            return redirect()->route('show-readers')->with('success', 'Student has been successfully removed');
        }
    }

    public function testimonial(){
        $this->data('testimonialData', Testimonial::orderBy('id', 'DESC')->paginate(2));
        return view($this->_pagepath.'testimonial.testimonial', $this->data);
    }

    public function addTestimonial(Request $request){
        if($request->isMethod('get')) return redirect()->back();
        if($request->isMethod('post')){
            $this->validate($request,[
                'name'=>'required',
                'date'=>'required',
                'upload' => 'required|mimes:jpeg,png,gif,jpg',
                'testimonial_content' => 'required|min:50|max:10000',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ]);
            $testimonialObject = new Testimonial();
            $testimonialObject->from = $request->name;
            $testimonialObject->class = $request->date;
            $testimonialObject->content = $request->testimonial_content;

            if ($request->hasFile('upload')) {
                $file = $request->file('upload');
                $ext = $file->getClientOriginalExtension();
                $imageName = str_random() . '.' . $ext;
                $UploadPath = public_path('lib/uploads/testimonial/images/');

                if (!$file->move($UploadPath, $imageName)) return redirect()->back();
                $testimonialObject->image = $imageName;
            }

            if ($testimonialObject->save()){
                return redirect()->route('testimonial')->with('success','Testimonial has been successfully published.');
            }
        }
    }
    public function deleteWithTestimonialImage($criteria)
    {
        $id = $criteria;
        $findData = Testimonial::findOrFail($id);
        $imageName = $findData->image;
        $deletePathOne = public_path('lib/uploads/testimonial/images/' . $imageName);
        if (file_exists($deletePathOne) && is_file($deletePathOne)) {
            return unlink($deletePathOne);
        }
        return true;
    }

    public function deleteTestimonial(Request $request)
    {
        $id = $request->id;
        DB::table('testimonials')->where('from', '=', $id)->delete();
        $findData = Testimonial::findOrFail($id);
        if ($this->deleteWithTestimonialImage($id) && $findData->delete()) {
            return redirect()->route('testimonial')->with('success','testimonial class has been successfully removed.');
        }
    }

    public function userStudent(){
        $this->data('userData', Student::orderBy('id', 'DESC')->get());
        return view($this->_pagepath.'user.studentUser', $this->data);
    }

    public function addUserStudent(Request $request){
        if($request->isMethod('get')) return redirect()->back();
        if($request->isMethod('post')){
            $this->validate($request,[
                'username'=>'required|unique:students,username',
                'email' => 'required|email|unique:students,email',
                'password' => 'required|min:6|max:20|confirmed',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ]);
            $tuitionObject = new Student();
            $tuitionObject->username = $request->username;
            $tuitionObject->email = $request->email;
            $tuitionObject->password = bcrypt($request->password);
            if ($tuitionObject->save()){
                return redirect()->route('user-student')->with('success','user has been added');
            }
        }
    }



}
