<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gonullu extends Model
{
    use HasFactory;

    protected $fillable = [
        'ad',
        'iletisim_bilgisi',
        'yetenekler',
    ];

    public function etkinlikGonulluler()
    {
        return $this->hasMany(EtkinlikGonullu::class);
    }
}
