<?php

namespace App\Http\Controllers\Backend;


use App\Models\SubjectEight;
use App\Models\SubjectFive;
use App\Models\SubjectFour;
use App\Models\SubjectNine;
use App\Models\SubjectOne;
use App\Models\SubjectSeven;
use App\Models\SubjectSix;
use App\Models\SubjectTen;
use App\Models\SubjectThree;
use App\Models\SubjectTwo;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SubjectController extends BackendController
{
    public function classOne(){
        $this->data('subjectOne', SubjectOne::orderBy('id', 'DESC')->get());
        return view($this->_pagepath.'.subjects.classOne.classOne', $this->data);
    }
    public function addSubjectOne(Request $request){
        if($request->isMethod('get')) return redirect()->back();
        if($request->isMethod('post')){
            $this->validate($request,[
                'subject'=>'required|unique:subject_ones,subject',
                'description'=>'required|min:10|max:10000',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ]);
            $subjectObject = new SubjectOne();
            $subjectObject->subject = $request->subject;
            $subjectObject->desc = $request->description;

            if ($subjectObject->save()){
                return redirect()->route('subject-one')->with('success','New subject has been successfully added.');
            }
        }
    }
    public function deleteSubjectOne(Request $request)
    {
        $id = $request->id;
        DB::table('subject_ones')->where('subject', '=', $id)->delete();
        $findData = SubjectOne::findOrFail($id);
        if ($findData->delete()) {
            return redirect()->route('subject-one')->with('success','subject has been successfully removed.');
        }
    }

    public function classTwo(){
        $this->data('subjectTwo', SubjectTwo::orderBy('id', 'DESC')->get());
        return view($this->_pagepath.'.subjects.classTwo.classTwo', $this->data);
    }
    public function addSubjectTwo(Request $request){
        if($request->isMethod('get')) return redirect()->back();
        if($request->isMethod('post')){
            $this->validate($request,[
                'subject'=>'required|unique:subject_twos,subject',
                'description'=>'required|min:10|max:10000',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ]);
            $subjectObject = new SubjectTwo();
            $subjectObject->subject = $request->subject;
            $subjectObject->desc = $request->description;

            if ($subjectObject->save()){
                return redirect()->route('subject-two')->with('success','New subject has been successfully added.');
            }
        }
    }
    public function deleteSubjectTwo(Request $request)
    {
        $id = $request->id;
        DB::table('subject_twos')->where('subject', '=', $id)->delete();
        $findData = SubjectTwo::findOrFail($id);
        if ($findData->delete()) {
            return redirect()->route('subject-two')->with('success','subject has been successfully removed.');
        }
    }

    public function classThree(){
        $this->data('subjectThree', SubjectThree::orderBy('id', 'DESC')->get());
        return view($this->_pagepath.'.subjects.classThree.classThree', $this->data);
    }
    public function addSubjectThree(Request $request){
        if($request->isMethod('get')) return redirect()->back();
        if($request->isMethod('post')){
            $this->validate($request,[
                'subject'=>'required|unique:subject_threes,subject',
                'description'=>'required|min:10|max:10000',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ]);
            $subjectObject = new SubjectThree();
            $subjectObject->subject = $request->subject;
            $subjectObject->desc = $request->description;

            if ($subjectObject->save()){
                return redirect()->route('subject-three')->with('success','New subject has been successfully added.');
            }
        }
    }
    public function deleteSubjectThree(Request $request)
    {
        $id = $request->id;
        DB::table('subject_threes')->where('subject', '=', $id)->delete();
        $findData = SubjectThree::findOrFail($id);
        if ($findData->delete()) {
            return redirect()->route('subject-three')->with('success','subject has been successfully removed.');
        }
    }

    public function classFour(){
        $this->data('subjectFour', SubjectFour::orderBy('id', 'DESC')->get());
        return view($this->_pagepath.'.subjects.classFour.classFour', $this->data);
    }
    public function addSubjectFour(Request $request){
        if($request->isMethod('get')) return redirect()->back();
        if($request->isMethod('post')){
            $this->validate($request,[
                'subject'=>'required|unique:subject_fours,subject',
                'description'=>'required|min:10|max:10000',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ]);
            $subjectObject = new SubjectFour();
            $subjectObject->subject = $request->subject;
            $subjectObject->desc = $request->description;

            if ($subjectObject->save()){
                return redirect()->route('subject-four')->with('success','New subject has been successfully added.');
            }
        }
    }
    public function deleteSubjectFour(Request $request)
    {
        $id = $request->id;
        DB::table('subject_fours')->where('subject', '=', $id)->delete();
        $findData = SubjectFour::findOrFail($id);
        if ($findData->delete()) {
            return redirect()->route('subject-four')->with('success','subject has been successfully removed.');
        }
    }

    public function classFive(){
        $this->data('subjectFive', SubjectFive::orderBy('id', 'DESC')->get());
        return view($this->_pagepath.'.subjects.classFive.classFive', $this->data);
    }
    public function addSubjectFive(Request $request){
        if($request->isMethod('get')) return redirect()->back();
        if($request->isMethod('post')){
            $this->validate($request,[
                'subject'=>'required|unique:subject_fives,subject',
                'description'=>'required|min:10|max:10000',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ]);
            $subjectObject = new SubjectFive();
            $subjectObject->subject = $request->subject;
            $subjectObject->desc = $request->description;

            if ($subjectObject->save()){
                return redirect()->route('subject-five')->with('success','New subject has been successfully added.');
            }
        }
    }
    public function deleteSubjectFive(Request $request)
    {
        $id = $request->id;
        DB::table('subject_fives')->where('subject', '=', $id)->delete();
        $findData = SubjectFive::findOrFail($id);
        if ($findData->delete()) {
            return redirect()->route('subject-five')->with('success','subject has been successfully removed.');
        }
    }

    public function classSix(){
        $this->data('subjectSix', SubjectSix::orderBy('id', 'DESC')->get());
        return view($this->_pagepath.'.subjects.classSix.classSix', $this->data);
    }
    public function addSubjectSix(Request $request){
        if($request->isMethod('get')) return redirect()->back();
        if($request->isMethod('post')){
            $this->validate($request,[
                'subject'=>'required|unique:subject_sixes,subject',
                'description'=>'required|min:10|max:10000',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ]);
            $subjectObject = new SubjectSix();
            $subjectObject->subject = $request->subject;
            $subjectObject->desc = $request->description;

            if ($subjectObject->save()){
                return redirect()->route('subject-six')->with('success','New subject has been successfully added.');
            }
        }
    }
    public function deleteSubjectSix(Request $request)
    {
        $id = $request->id;
        DB::table('subject_sixes')->where('subject', '=', $id)->delete();
        $findData = SubjectSix::findOrFail($id);
        if ($findData->delete()) {
            return redirect()->route('subject-six')->with('success','subject has been successfully removed.');
        }
    }

    public function classSeven(){
        $this->data('subjectSeven', SubjectSeven::orderBy('id', 'DESC')->get());
        return view($this->_pagepath.'.subjects.classSeven.classSeven', $this->data);
    }
    public function addSubjectSeven(Request $request){
        if($request->isMethod('get')) return redirect()->back();
        if($request->isMethod('post')){
            $this->validate($request,[
                'subject'=>'required|unique:subject_sevens,subject',
                'description'=>'required|min:10|max:10000',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ]);
            $subjectObject = new SubjectSeven();
            $subjectObject->subject = $request->subject;
            $subjectObject->desc = $request->description;

            if ($subjectObject->save()){
                return redirect()->route('subject-seven')->with('success','New subject has been successfully added.');
            }
        }
    }
    public function deleteSubjectSeven(Request $request)
    {
        $id = $request->id;
        DB::table('subject_sevens')->where('subject', '=', $id)->delete();
        $findData = SubjectSeven::findOrFail($id);
        if ($findData->delete()) {
            return redirect()->route('subject-seven')->with('success','subject has been successfully removed.');
        }
    }

    public function classEight(){
        $this->data('subjectEight', SubjectEight::orderBy('id', 'DESC')->get());
        return view($this->_pagepath.'.subjects.classEight.classEight', $this->data);
    }
    public function addSubjectEight(Request $request){
        if($request->isMethod('get')) return redirect()->back();
        if($request->isMethod('post')){
            $this->validate($request,[
                'subject'=>'required|unique:subject_eights,subject',
                'description'=>'required|min:10|max:10000',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ]);
            $subjectObject = new SubjectEight();
            $subjectObject->subject = $request->subject;
            $subjectObject->desc = $request->description;

            if ($subjectObject->save()){
                return redirect()->route('subject-eight')->with('success','New subject has been successfully added.');
            }
        }
    }
    public function deleteSubjectEight(Request $request)
    {
        $id = $request->id;
        DB::table('subject_eights')->where('subject', '=', $id)->delete();
        $findData = SubjectEight::findOrFail($id);
        if ($findData->delete()) {
            return redirect()->route('subject-eight')->with('success','subject has been successfully removed.');
        }
    }

    public function classNine(){
        $this->data('subjectNine', SubjectNine::orderBy('id', 'DESC')->get());
        return view($this->_pagepath.'.subjects.classNine.classNine', $this->data);
    }
    public function addSubjectNine(Request $request){
        if($request->isMethod('get')) return redirect()->back();
        if($request->isMethod('post')){
            $this->validate($request,[
                'subject'=>'required|unique:subject_nines,subject',
                'description'=>'required|min:10|max:10000',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ]);
            $subjectObject = new SubjectNine();
            $subjectObject->subject = $request->subject;
            $subjectObject->desc = $request->description;

            if ($subjectObject->save()){
                return redirect()->route('subject-nine')->with('success','New subject has been successfully added.');
            }
        }
    }
    public function deleteSubjectNine(Request $request)
    {
        $id = $request->id;
        DB::table('subject_nines')->where('subject', '=', $id)->delete();
        $findData = SubjectNine::findOrFail($id);
        if ($findData->delete()) {
            return redirect()->route('subject-nine')->with('success','subject has been successfully removed.');
        }
    }

    public function classTen(){
        $this->data('subjectTen', SubjectTen::orderBy('id', 'DESC')->get());
        return view($this->_pagepath.'.subjects.classTen.classTen', $this->data);
    }
    public function addSubjectTen(Request $request){
        if($request->isMethod('get')) return redirect()->back();
        if($request->isMethod('post')){
            $this->validate($request,[
                'subject'=>'required|unique:subject_tens,subject',
                'description'=>'required|min:10|max:10000',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ]);
            $subjectObject = new SubjectTen();
            $subjectObject->subject = $request->subject;
            $subjectObject->desc = $request->description;

            if ($subjectObject->save()){
                return redirect()->route('subject-ten')->with('success','New subject has been successfully added.');
            }
        }
    }
    public function deleteSubjectTen(Request $request)
    {
        $id = $request->id;
        DB::table('subject_tens')->where('subject', '=', $id)->delete();
        $findData = SubjectTen::findOrFail($id);
        if ($findData->delete()) {
            return redirect()->route('subject-ten')->with('success','subject has been successfully removed.');
        }
    }
}
