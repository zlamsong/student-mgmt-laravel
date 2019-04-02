<?php

namespace App\Http\Controllers\Frontend;

use App\Models\About;
use App\Models\Reader;
use App\Models\Tuition;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Mail\Enroll;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;

class TuitionController extends FrontendController
{
    public function tuitionDetail(Request $request){
        $creteria = $request->id;
        $singleTuitionData = Tuition::findOrFail($creteria);
        $this->data('aboutData', About::orderBy('id', 'DESC')->get());
        return view($this->_pagepath . 'tuition.tuitionDetail', compact('singleTuitionData'), $this->data);
    }

    public function enroll(Request $request){
        $creteria = $request->id;
        $enrollData = Tuition::findOrFail($creteria);
        $this->data('aboutData', About::orderBy('id', 'DESC')->get());
        return view($this->_pagepath . 'tuition.enroll', compact('enrollData'), $this->data);
    }

    public function addEnroll(Request $request)
    {
        if($request->isMethod('get')) return redirect()->back();
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'name' => 'required',
                'class'=> 'required',
                'roll_no'=> 'required|numeric',
                'email' => 'required|email',
                'subject' => 'required',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ]);
            $enrollObject = new Reader();
            $enrollObject->full_name = $request->name;
            $enrollObject->class = $request->class;
            $enrollObject->roll_no = $request->roll_no;
            $enrollObject->email = $request->email;
            $enrollObject->subject = $request->subject;

            if ($enrollObject->save()){
                Mail::to($request->email)->send(new Enroll());
                return redirect()->route('home')->with('success','Successfully enrolled.');
            }

        }
    }

}
