<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EtkinlikKategoriIliskilendirme extends Model
{
    use HasFactory;

    protected $fillable = [
        'etkinlik_id',
        'kategori_id',
    ];
}
