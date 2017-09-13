<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public $table = 'companies';
    protected $primaryKey = 'employer_id';
    protected $guarded =[];

    public function employer()
    {
     return $this->belongsTo('App\Models\User','employer_id');
    }
}
