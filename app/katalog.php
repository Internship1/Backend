<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class katalog extends Model
{
    protected $table = 'katalog';

    protected $fillable = [
    	'judul',
        'deskripsi',
        'harga',
        'kondisi',
        'gambar',
        'lokasi',
        'email',
        'telpon',
        'pemilik_id',
        'kategori_id',
    ];

    protected $hidden = [];

    public function kategori()
    {
    	return $this->belongsTo('App\kategori');
    }
}
