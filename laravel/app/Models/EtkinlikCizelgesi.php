<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EtkinlikCizelgesi extends Model
{
    use HasFactory;

    protected $fillable = [
        'etkinlik_id',
        'aktivite_adi',
        'baslangic_saati',
        'bitis_saati',
    ];

    public function etkinlik()
    {
        return $this->belongsTo(Etkinlik::class);
    }
}
