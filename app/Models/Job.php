<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    //protected $table='jobs';
    protected $guarded =[];

    public function employer()
    {
     return $this->belongsTo('App\Models\User','employer_id');
    }
    public function contract()
    {
    return $this->hasMany('App\Models\Contract', 'job_id');
    }
    public function apply()
    {
    return $this->hasMany('App\Models\Apply', 'job_id');
    }
    public function invite()
    {
    return $this->hasMany('App\Models\Invitation', 'job_id');
    }
    public function jobQualify()
    {
    return $this->hasMany('App\Models\JobQualify', 'job_id');
    }
    public function jobTypeTable()
    {
    return $this->hasMany('App\Models\JobTypeTable', 'job_id');
    }
}
