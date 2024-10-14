<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('dokters', function (Blueprint $table) {
            $table->id('dokter_id');
            $table->binary('foto')->nullable();
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
     */
    public function down(): void
    {
        Schema::dropIfExists('dokters');
    }
};
