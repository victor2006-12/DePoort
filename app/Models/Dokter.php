<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
     /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokters', function (Blueprint $table) {
            $table->id('dokter_id');
            $table->binary('foto');
            $table->string('voornaam', 255);
            $table->string('tussenvoegsel', 255)->nullable();
            $table->string('achternaam', 255);
            $table->string('adres', 255);
            $table->string('postcode', 6);
            $table->string('woonplaats', 255);
            $table->string('land', 255);
            $table->string('telefoon', 15);
            $table->string('wachtwoord', 255);         
            $table->timestamps();
        });
    }
 
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dokters');
    }
}
