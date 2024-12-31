<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organizator extends Model
{
    use HasFactory;

    protected $fillable = [
        'ad',
        'iletisim_bilgisi',
    ];

    public function etkinlikler()
    {
        return $this->hasMany(Etkinlik::class);
    }
}
