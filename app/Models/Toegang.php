<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toegang extends Model
{
    use HasFactory;

    protected $fillable = [
        'toegang_id',
        'gebruikers_id',
        'dokter_id',
        'admin_id',
        'verzoek_toegang',
        'afspraak_toegang',
    ];
}
