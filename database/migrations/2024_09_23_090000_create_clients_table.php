<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration // Naming convention: pluralize the table name
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id('id');
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
            $table->boolean('geactiveerd')->default(false);
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
        Schema::dropIfExists('clients'); // Drops the clients table if it exists
    }
}
