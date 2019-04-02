<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Auth;
use Illuminate\Database\Eloquent\Model;

class Admin extends Auth
{
    protected $fillable = ['name', 'username', 'email', 'password', 'status', 'image'];
    public function privilege(){
        return $this->belongsToMany('App\Models\Privilege','manage_privilege','admin_id','privilege_id','id');
    }
}
