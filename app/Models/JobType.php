<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobType extends Model
{
  public $table = 'jobtypes';
  protected $guarded =[];

  public function jobTypeTable()
  {
   return $this->hasMany('App\Models\JobTypeTable','jobType_id');
  }
}
