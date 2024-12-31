<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bildirim extends Model
{
    use HasFactory;

    protected $fillable = [
        'kullanici_id',
        'mesaj',
        'gonderim_tarihi',
    ];

    public function kullanici()
    {
        return $this->belongsTo(Kullanici::class);
    }
}
