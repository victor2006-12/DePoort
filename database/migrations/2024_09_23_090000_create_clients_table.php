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
            $table->id(); // Create an auto-incrementing primary key
            $table->unsignedBigInteger('gebruikers_id'); // Foreign key or reference to a user, if needed
            $table->string('foto')->nullable(); // Allows NULL values if no photo is provided
            $table->string('voornaam');
            $table->string('tussenvoegsel')->nullable(); // Allow NULL for middle name
            $table->string('achternaam');
            $table->string('adres');
            $table->string('postcode');
            $table->string('woonplaats');
            $table->string('land');
            $table->string('telefoon');
            $table->string('wachtwoord'); // Make sure to hash this in the model or controller
            $table->boolean('geactiveerd')->default(false); // Default to not activated
            $table->timestamps(); // Creates created_at and updated_at columns
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
