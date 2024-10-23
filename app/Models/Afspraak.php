<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Afspraak extends Model
{
    use HasFactory;

    //zorgt ervoor dat hij afspraak_id gebruikt ipv id als primary key
    protected $table = 'afspraaks';
    protected $primaryKey = 'afspraak_id';

    protected $fillable = [
        'gebruikers_id',
        'dokter_id',
        'datum_afspraak',
        'tijd_afspraak',
        'onderwerp_afspraak',
        'consult',
    ];
}
