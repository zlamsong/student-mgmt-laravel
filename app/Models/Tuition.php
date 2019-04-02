<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tuition extends Model
{
    protected $fillable = ['subject', 'class', 'image', 'time', 'from', 'to', 'desc'];
}
