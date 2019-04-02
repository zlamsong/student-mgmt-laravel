<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Auth;

class Student extends Auth
{
    protected $fillable =['username', 'email', 'password'];
}
