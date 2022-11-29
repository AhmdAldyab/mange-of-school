<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProcessingFee extends Model
{
    public function student()
    {
        return $this->belongsTo('App\Models\Students','student_id');
    }
}
