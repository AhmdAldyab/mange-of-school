<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;



class Classroom extends Model 
{

    use HasTranslations;
    public $translatable = ['Name_Class'];

    protected $fillable=['Grade_id','Name_Class'];
    protected $table = 'Classrooms';
    public $timestamps = true;

    public function Grades()
    {
        return $this->belongsTo('App\Models\Grade', 'Grade_id');
    }

}