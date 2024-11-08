<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'gebruikers_id',
        'foto',
        'voornaam',
        'tussenvoegsel',
        'achternaam',
        'adres',
        'postcode',
        'woonplaats',
        'land',
        'telefoon',
        'wachtwoord',
        'geactiveerd',
    ];

    protected $dates = ['deleted_at']; // Enables soft delete functionality
}
