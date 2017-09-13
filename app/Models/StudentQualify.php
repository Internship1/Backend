<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentQualify extends Model
{
  public $table = 'studentqualify';
  protected $guarded =[];

  public function studentProfile()
  {
   return $this->belongsTo('App\Models\StudentProfile','student_id');
  }
  public function qualify()
  {
   return $this->belongsTo('App\Models\Qualify','qualify_id');
  }
}
