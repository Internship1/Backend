<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{

protected $guarded =[];

    public function follower()
    {
    return $this->belongsTo('App\Models\User', 'following_id');
    }

    public function followable()
    {
    return $this->belongsTo('App\Models\User', 'followable_id');
    }
}
