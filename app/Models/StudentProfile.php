<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentProfile extends Model
{
  protected $table='studentsprofile';
  protected $guarded =[];
  protected $primaryKey = 'student_id';

    public function student()
    {
     return $this->belongsTo('App\Models\User','student_id');
    }
    public function studentQualify()
    {
     return $this->hasMany('App\Models\StudentQualify','student_id');
    }
}
