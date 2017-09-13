<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobTypeTable extends Model
{
  public $table = 'jobtypetable';
  protected $guarded =[];

  public function job()
  {
   return $this->belongsTo('App\Models\Job','job_id');
  }
  public function jobType()
  {
   return $this->belongsTo('App\Models\JobType','jobType_id');
  }
}
