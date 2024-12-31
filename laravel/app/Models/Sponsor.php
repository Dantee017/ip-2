<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    use HasFactory;

    protected $fillable = [
        'ad',
        'iletisim_bilgisi',
        'katki_miktari',
    ];

    public function etkinlikSponsorlar()
    {
        return $this->hasMany(EtkinlikSponsor::class);
    }
}
