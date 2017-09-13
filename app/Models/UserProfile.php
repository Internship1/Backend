<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class UserProfile extends Model
{
    protected $table ='usersprofile';
    protected $primaryKey = 'user_id';
    protected $guarded =[];


    public function user()
    {
      return $this->belongsTo('App\Models\User','user_id');
    }
}
