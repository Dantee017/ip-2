<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indirimler extends Model
{
    use HasFactory;

    protected $fillable = [
        'kod',
        'indirim_yuzdesi',
        'son_tarih',
    ];

    public function etkinlikIndirimler()
    {
        return $this->hasMany(EtkinlikIndirim::class);
    }
}
