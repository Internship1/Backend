<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'gender','role_id','username', 'email', 'password','full_name','is_approve'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','is_approve','role_id'
    ];

      public function role()
      {
      return $this->belongsTo('App\Models\Role', 'role_id');
      }
      public function contract()
      {
      return $this->hasMany('App\Models\Contract', 'student_id');
      }
      public function company()
      {
      return $this->hasOne('App\Models\Company', 'employer_id');
      }
      public function userProfile()
      {
      return $this->hasOne('App\Models\UserProfile', 'user_id');
      }
      public function studentProfile()
      {
      return $this->hasOne('App\Models\StudentProfile', 'student_id');
      }

      public function following()
      {
      return $this->hasMany('App\Models\User', 'following_id');
      }
      public function followable()
      {
      return $this->hasMany('App\Models\User', 'followable_id');
      }
      public function invite()
      {
      return $this->hasMany('App\Models\Invitation', 'student_id');
      }
      public function apply()
      {
      return $this->hasMany('App\Models\Apply', 'student_id');
      }
      public function Post()
      {
      return $this->hasMany('App\Models\Post', 'user_id');
      }
      public function Comment()
      {
      return $this->hasMany('App\Models\Comment', 'user_id');
      }
      public function Sender()
      {
      return $this->hasMany('App\Models\Message', 'sender_id');
      }
      public function Receiver()
      {
      return $this->hasMany('App\Models\Message', 'receiver_id');
      }
      public function job()
      {
       return $this->hasMany('App\Models\Job','employer_id');
      }





}
