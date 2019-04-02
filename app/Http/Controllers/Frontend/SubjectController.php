<?php

namespace App\Http\Controllers\Frontend;

use App\Models\About;
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
use App\Http\Controllers\Controller;

class SubjectController extends FrontendController
{
    public function oneIndex(){
        $this->data('oneData', SubjectOne::orderBy('id', 'DESC')->get());
        $this->data('total', SubjectOne::count('id', 'DESC'));
        $this->data('aboutData', About::orderBy('id', 'DESC')->get());
        return view($this->_pagepath . 'subject.c_one.one', $this->data);
    }
    public function oneDetail(Request $request){
        $creteria = $request->id;
        $singleSubjectData = SubjectOne::findOrFail($creteria);
        $this->data('aboutData', About::orderBy('id', 'DESC')->get());
        return view($this->_pagepath . 'subject.c_one.oneDetail', compact('singleSubjectData'), $this->data);
    }

    public function twoIndex(){
    $this->data('twoData', SubjectTwo::orderBy('id', 'DESC')->get());
    $this->data('total', SubjectTwo::count('id', 'DESC'));
    $this->data('aboutData', About::orderBy('id', 'DESC')->get());
    return view($this->_pagepath . 'subject.c_two.two', $this->data);
}
    public function twoDetail(Request $request){
        $creteria = $request->id;
        $singleSubjectData = SubjectTwo::findOrFail($creteria);
        $this->data('aboutData', About::orderBy('id', 'DESC')->get());
        return view($this->_pagepath . 'subject.c_two.twoDetail', compact('singleSubjectData'), $this->data);
    }

    public function threeIndex(){
        $this->data('threeData', SubjectThree::orderBy('id', 'DESC')->get());
        $this->data('total', SubjectThree::count('id', 'DESC'));
        $this->data('aboutData', About::orderBy('id', 'DESC')->get());
        return view($this->_pagepath . 'subject.c_three.three', $this->data);
    }
    public function threeDetail(Request $request){
        $creteria = $request->id;
        $singleSubjectData = SubjectThree::findOrFail($creteria);
        $this->data('aboutData', About::orderBy('id', 'DESC')->get());
        return view($this->_pagepath . 'subject.c_three.threeDetail', compact('singleSubjectData'), $this->data);
    }

    public function fourIndex(){
        $this->data('fourData', SubjectFour::orderBy('id', 'DESC')->get());
        $this->data('total', SubjectFour::count('id', 'DESC'));
        $this->data('aboutData', About::orderBy('id', 'DESC')->get());
        return view($this->_pagepath . 'subject.c_four.four', $this->data);
    }
    public function fourDetail(Request $request){
        $creteria = $request->id;
        $singleSubjectData = SubjectFour::findOrFail($creteria);
        $this->data('aboutData', About::orderBy('id', 'DESC')->get());
        return view($this->_pagepath . 'subject.c_four.fourDetail', compact('singleSubjectData'), $this->data);
    }

    public function fiveIndex(){
        $this->data('fiveData', SubjectFive::orderBy('id', 'DESC')->get());
        $this->data('total', SubjectFive::count('id', 'DESC'));
        $this->data('aboutData', About::orderBy('id', 'DESC')->get());
        return view($this->_pagepath . 'subject.c_five.five', $this->data);
    }
    public function fiveDetail(Request $request){
        $creteria = $request->id;
        $singleSubjectData = SubjectFive::findOrFail($creteria);
        $this->data('aboutData', About::orderBy('id', 'DESC')->get());
        return view($this->_pagepath . 'subject.c_five.fiveDetail', compact('singleSubjectData'), $this->data);
    }

    public function sixIndex(){
        $this->data('sixData', SubjectSix::orderBy('id', 'DESC')->get());
        $this->data('total', SubjectSix::count('id', 'DESC'));
        $this->data('aboutData', About::orderBy('id', 'DESC')->get());
        return view($this->_pagepath . 'subject.c_six.six', $this->data);
    }
    public function sixDetail(Request $request){
        $creteria = $request->id;
        $singleSubjectData = SubjectSix::findOrFail($creteria);
        $this->data('aboutData', About::orderBy('id', 'DESC')->get());
        return view($this->_pagepath . 'subject.c_six.sixDetail', compact('singleSubjectData'), $this->data);
    }

    public function sevenIndex(){
        $this->data('sevenData', SubjectSeven::orderBy('id', 'DESC')->get());
        $this->data('total', SubjectSeven::count('id', 'DESC'));
        $this->data('aboutData', About::orderBy('id', 'DESC')->get());
        return view($this->_pagepath . 'subject.c_seven.seven', $this->data);
    }
    public function sevenDetail(Request $request){
        $creteria = $request->id;
        $singleSubjectData = SubjectSeven::findOrFail($creteria);
        $this->data('aboutData', About::orderBy('id', 'DESC')->get());
        return view($this->_pagepath . 'subject.c_seven.sevenDetail', compact('singleSubjectData'), $this->data);
    }

    public function eightIndex(){
    $this->data('eightData', SubjectEight::orderBy('id', 'DESC')->get());
    $this->data('total', SubjectEight::count('id', 'DESC'));
    $this->data('aboutData', About::orderBy('id', 'DESC')->get());
    return view($this->_pagepath . 'subject.c_eight.eight', $this->data);
}
    public function eightDetail(Request $request){
        $creteria = $request->id;
        $singleSubjectData = SubjectEight::findOrFail($creteria);
        $this->data('aboutData', About::orderBy('id', 'DESC')->get());
        return view($this->_pagepath . 'subject.c_eight.eightDetail', compact('singleSubjectData'), $this->data);
    }

    public function nineIndex(){
        $this->data('nineData', SubjectNine::orderBy('id', 'DESC')->get());
        $this->data('total', SubjectNine::count('id', 'DESC'));
        $this->data('aboutData', About::orderBy('id', 'DESC')->get());
        return view($this->_pagepath . 'subject.c_nine.nine', $this->data);
    }
    public function nineDetail(Request $request){
        $creteria = $request->id;
        $singleSubjectData = SubjectNine::findOrFail($creteria);
        $this->data('aboutData', About::orderBy('id', 'DESC')->get());
        return view($this->_pagepath . 'subject.c_nine.nineDetail', compact('singleSubjectData'), $this->data);
    }

    public function tenIndex(){
        $this->data('tenData', SubjectTen::orderBy('id', 'DESC')->get());
        $this->data('total', SubjectTen::count('id', 'DESC'));
        $this->data('aboutData', About::orderBy('id', 'DESC')->get());
        return view($this->_pagepath . 'subject.c_ten.ten', $this->data);
    }
    public function tenDetail(Request $request){
        $creteria = $request->id;
        $singleSubjectData = SubjectTen::findOrFail($creteria);
        $this->data('aboutData', About::orderBy('id', 'DESC')->get());
        return view($this->_pagepath . 'subject.c_ten.tenDetail', compact('singleSubjectData'), $this->data);
    }
}
