<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konum extends Model
{
    use HasFactory;

    protected $fillable = [
        'ad',
        'adres',
        'kapasite',
    ];

    public function etkinlikler()
    {
        return $this->hasMany(Etkinlik::class);
    }
}
