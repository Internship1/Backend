<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
      protected $guarded =[];

      public function student()
      {
      return $this->belongsTo('App\Models\User', 'student_id');
      }
      public function job()
      {
      return $this->belongsTo('App\Models\Job', 'job_id');
      }
      public function feedback()
      {
      return $this->hasOne('App\Models\Feedback', 'contract_id');
      }
}
