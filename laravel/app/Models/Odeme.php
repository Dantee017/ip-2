<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Odeme extends Model
{
    use HasFactory;

    protected $fillable = [
        'kayit_id',
        'tutar',
        'odeme_tarihi',
        'odeme_yontemi',
    ];

    public function kayit()
    {
        return $this->belongsTo(Kayit::class);
    }
}
