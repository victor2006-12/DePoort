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
        Schema::create('toegangs', function (Blueprint $table) {
            $table->id("toegang_id");
            $table->string("gebruikers_id");
            $table->string("dokter_id");
            $table->string("admin_id"); 
            $table->boolean("verzoek_toegang")->default(false);
            $table->boolean("afspraak_toegang")->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('toegangs');
    }
};
