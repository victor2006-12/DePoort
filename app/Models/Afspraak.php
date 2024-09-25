<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Afspraak extends Model
{
    use HasFactory;

    protected $fillable = [
        'gebruikers_id',
        'dokter_id',
        'datum_afspraak',
        'tijd_afspraak',
        'onderwerp_afspraak',
        'consult',
    ];
}
