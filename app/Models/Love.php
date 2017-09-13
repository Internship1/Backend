<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Love extends Model
{

    protected $guarded =[];
    public $timestamps = false;

    public function Post()
    {
    return $this->belongsTo('App\Models\Post', 'post_id');
    }
}
