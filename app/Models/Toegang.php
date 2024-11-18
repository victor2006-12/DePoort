<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toegang extends Model
{
    use HasFactory;    

     //zorgt ervoor dat hij afspraak_id gebruikt ipv id als primary key
     protected $table = 'toegangs';
     protected $primaryKey = 'toegang_id';

    protected $fillable = [
        'toegang_id',
        'gebruikers_id',
        'dokter_id',
        'admin_id',
        'verzoek_toegang',
        'afspraak_toegang',
    ];
}
