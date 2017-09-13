<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    //protected $table='invitations';
    protected $guarded =[];
    
    public function student()
    {
    return $this->belongsTo('App\Models\User', 'student_id');
    }

    public function job()
    {
    return $this->belongsTo('App\Models\Job', 'job_id');
    }
}
