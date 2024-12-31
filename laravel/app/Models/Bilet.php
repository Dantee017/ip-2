<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bilet extends Model
{
    use HasFactory;

    protected $fillable = [
        'etkinlik_id',
        'fiyat',
        'tur',
        'miktar',
    ];

    public function etkinlik()
    {
        return $this->belongsTo(Etkinlik::class);
    }

    public function kayitlar()
    {
        return $this->hasMany(Kayit::class);
    }
}
