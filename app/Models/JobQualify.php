<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobQualify extends Model
{
  public $table = 'jobsqualify';
  protected $guarded =[];

  public function job()
  {
   return $this->belongsTo('App\Models\Job','job_id');
  }
  public function qualify()
  {
   return $this->belongsTo('App\Models\Qualify','qualify_id');
  }
}
