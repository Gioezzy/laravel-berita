<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $fillable = [
        'judul',
        'isi',
        'gambar',
        'penulis',
        'tanggal',
        'status'
    ];

    public function getRouteKeyName()
    {
        return 'id'; // atau nama kolom unik yang dipakai di route
    }
}
