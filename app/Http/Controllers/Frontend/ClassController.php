<?php

namespace App\Http\Controllers\Frontend;


use App\Models\About;
use App\Models\ClassOne;
use App\Models\ClassThree;
use App\Models\ClassTwo;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClassController extends FrontendController
{
    public function indexOne()
    {
        $this->data('oneData', ClassOne::orderBy('id', 'DESC')->get());
        $this->data('first', ClassOne::distinct()->
        select('first_name', 'last_name')->where('roll_no', 1)->get());
        $this->data('second', ClassOne::select('first_name', 'last_name')->where('roll_no', 2)->get());
        $this->data('third', ClassOne::select('first_name', 'last_name')->where('roll_no', 3)->get());
        $this->data('total', ClassOne::count('id'));
        $this->data('teacher', Teacher::select('first_name','last_name')->where('class_teacher_of',1)->get());
        $this->data('aboutData', About::orderBy('id', 'DESC')->get());
        return view($this->_pagepath . 'student.one.one', $this->data);
    }

    public function indexTwo()
    {
        $this->data('twoData', ClassTwo::orderBy('id', 'DESC')->get());
        $this->data('first', ClassTwo::select('first_name', 'last_name')->where('roll_no', 1)->get());
        $this->data('second', ClassTwo::select('first_name', 'last_name')->where('roll_no', 2)->get());
        $this->data('third', ClassTwo::select('first_name', 'last_name')->where('roll_no', 3)->get());
        $this->data('total', ClassTwo::count('id'));
        $this->data('teacher', Teacher::select('first_name','last_name')->where('class_teacher_of',2)->get());
        $this->data('aboutData', About::orderBy('id', 'DESC')->get());
        return view($this->_pagepath . 'student.two.two', $this->data);
    }

    public function indexThree()
    {
        $this->data('threeData', ClassThree::orderBy('id', 'DESC')->get());
        $this->data('first', ClassThree::select('first_name', 'last_name')->where('roll_no', 1)->get());
        $this->data('second', ClassThree::select('first_name', 'last_name')->where('roll_no', 2)->get());
        $this->data('third', ClassThree::select('first_name', 'last_name')->where('roll_no', 3)->get());
        $this->data('total', ClassThree::count('id'));
        $this->data('teacher', Teacher::select('first_name','last_name')->where('class_teacher_of',3)->get());
        $this->data('aboutData', About::orderBy('id', 'DESC')->get());
        return view($this->_pagepath . 'student.three.three', $this->data);
    }
}

