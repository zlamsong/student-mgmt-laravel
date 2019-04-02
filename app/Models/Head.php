<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Head extends Model
{
    protected $fillable = ['first_name', 'last_name', 'position', 'image', 'document'];
}
