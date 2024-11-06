<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory; // Optioneel, als je geen factory gebruikt, kun je dit weglaten

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
}
