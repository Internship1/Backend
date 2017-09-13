<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Apply extends Model
{
    protected $table='applies';
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
