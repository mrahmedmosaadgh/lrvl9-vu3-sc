<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forqan_controlmark extends Model
{
    use HasFactory;
    public $guarded = [];


    public function mystudent(){
        return $this->belongsTo('App\Models\user','student_id','id');
        // return $this->hasMany('App\Models\user','student_id','id');
        // belongsTo
    }
    public function myteacher(){
        return $this->belongsTo('App\Models\user','teacher_id','id');
        // return $this->hasMany('App\Models\user','student_id','id');
        // belongsTo
    }
}
