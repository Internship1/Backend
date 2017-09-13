<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
  protected $guarded =[];

  public function sender()
  {
  return $this->hasOne('App\Models\User', 'sender_id');
  }
  public function receiver()
  {
  return $this->hasOne('App\Models\User', 'receiver_id');
  }
}
