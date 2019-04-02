<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reader extends Model
{
    protected $fillable = ['full_name', 'class', 'roll_no', 'email', 'subject'];
}
