<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    protected $table = 'kategori';

    protected $fillable = ['nama'];

    protected $hidden = [];

    // untuk relasi antar tabel = 1 kategori mempunyai banyak katalog
    public function katalog()
    {
    	return $this->hasMany('App\katalog');
    }
}
