<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etkinlik extends Model
{
    use HasFactory;

    protected $fillable = [
        'ad',
        'aciklama',
        'tarih',
        'baslangic_saati',
        'bitis_saati',
        'konum_id',
        'organizator_id',
    ];

    public function konum()
    {
        return $this->belongsTo(Konum::class);
    }

    public function organizator()
    {
        return $this->belongsTo(Organizator::class);
    }

    public function kategoriler()
    {
        return $this->belongsToMany(EtkinlikKategori::class, 'etkinlik_kategori_iliskilendirme');
    }

    public function biletler()
    {
        return $this->hasMany(Bilet::class);
    }

    public function kayitlar()
    {
        return $this->hasMany(Kayit::class);
    }

    public function sponsorlar()
    {
        return $this->hasMany(EtkinlikSponsor::class);
    }
}
