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
        Schema::create('afspraaks', function (Blueprint $table) {
            $table->id("afspraak_id");
            $table->foreignId("gebruikers_id");
            $table->foreignId("dokter_id"); 
            $table->date("datum_afspraak");
            $table->time("tijd_afspraak");
            $table->string("onderwerp_afspraak", 255);
            $table->string("consult", 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('afspraaks');
    }
};
