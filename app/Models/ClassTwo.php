<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassTwo extends Model
{
    protected $fillable = ['first_name', 'last_name', 'roll_no', 'DoB', 'gender', 'contact', 'parent_name', 'image'];
}
