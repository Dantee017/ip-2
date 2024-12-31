<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kayit extends Model
{
    use HasFactory;

    protected $fillable = [
        'kullanici_id',
        'etkinlik_id',
        'bilet_id',
        'kayit_tarihi',
    ];

    public function kullanici()
    {
        return $this->belongsTo(Kullanici::class);
    }

    public function etkinlik()
    {
        return $this->belongsTo(Etkinlik::class);
    }

    public function bilet()
    {
        return $this->belongsTo(Bilet::class);
    }
}
