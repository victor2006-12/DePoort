<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
 
class CreateClientTable extends Migration
{
   use HasFactory;

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

