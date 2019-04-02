<?php

namespace App\Http\Controllers\Backend;

use App\Models\Admin;
use App\Models\ClassOne;
use App\Models\ClassThree;
use App\Models\ClassTwo;
use App\Models\Head;
use App\Models\Notice;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends BackendController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->data('noticeNo', Notice::count('id'));
        $this->data('one', ClassOne::count('id'));
        $this->data('two', ClassTwo::count('id'));
        $this->data('three', ClassThree::count('id'));
//        $this->data('total', one);
        $this->data('totalTeacher', Teacher::count('id'));
        $this->data('totalHead', Head::count('id'));
        $this->data('totalAdmin', Admin::count());
        return view($this->_pagepath . 'dashboard.dashboard', $this->data);
    }
}
