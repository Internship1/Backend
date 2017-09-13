<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Qualify extends Model
{
    protected $table='qualifies';
    protected $guarded =[];


    public function studentQualify()
      {
        return $this->hasMany('App\Models\StudentQualify','qualify_id');
      }

    public function jobQualify()
      {
        return $this->hasMany('App\Models\JobQualify','qualify_id');
      }
}
