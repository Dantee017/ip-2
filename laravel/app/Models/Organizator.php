<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organizator extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
    ];

    public function etkinlikler()
    {
        return $this->hasMany(etkinlikler::class);
    }
}
