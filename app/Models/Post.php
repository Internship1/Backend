<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded =[];

    public function user()
    {
    return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function love()
    {
    return $this->hasMany('App\Models\Love', 'post_id');
    }
    public function comment()
    {
    return $this->hasMany('App\Models\Comment', 'post_id');
    }
}
