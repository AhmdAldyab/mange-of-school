<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Translatable\HasTranslations;

class Students extends Authenticatable
{
    use SoftDeletes;
    use HasTranslations;
    public $translatable = ['name'];
    protected $guarded = [];

    public function gender()
    {
        return  $this->belongsTo('App\Models\Gender', 'gender_id');
    }

    public function grade()
    {
        return  $this->belongsTo('App\Models\Grade', 'Grade_id');
    }

    public function classroom()
    {
        return $this->belongsTo('App\Models\Classroom', 'Classroom_id');
    }

    public function section()
    {
        return  $this->belongsTo('App\Models\Sections', 'section_id');
    }

    public function Nationality()
    {
        return  $this->belongsTo('App\Models\Nationalities', 'nationalitie_id');
    }

    public function myparent()
    {
        return  $this->belongsTo('App\Models\My_Parent', 'parent_id');
    }

    public function images()
    {
        return $this->morphMany('App\Models\Image', 'imageable');
    }
    public function student_account()
    {
        return $this->hasMany('App\Models\StudentAccount','student_id');
    }
    public function Attendance()
    {
        return $this->hasMany('App\Models\Attendance','student_id');
    }
}
