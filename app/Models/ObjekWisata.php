<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObjekWisata extends Model
{
    use HasFactory;

    protected $table = 'objek_wisata';

    protected $fillable = [
        'nama',
        'alamat',
        'fasilitas',
        'gambar',
        'latitude',
        'longitude',
    ];
}
