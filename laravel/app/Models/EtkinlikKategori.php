<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EtkinlikKategori extends Model
{
    use HasFactory;

    protected $fillable = [
        'ad',
        'aciklama',
    ];

    public function etkinlikler()
    {
        return $this->belongsToMany(Etkinlik::class, 'etkinlik_kategori_iliskilendirme');
    }
}
