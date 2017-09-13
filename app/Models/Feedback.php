<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table ='feedbacks';
    protected $primaryKey = 'contract_id';
    protected $guarded =[];
    public function contract()
    {
    return $this->belongsTo('App\Models\Contract', 'contract_id');
    }
}
