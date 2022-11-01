<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTravailleursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travailleur', function (Blueprint $table) {
            $table->id();
            $table->string('cin')->unique();
            $table->string('nom');
            $table->string('prenom');
            $table->string('tel');
            $table->string('email')->unique();
            $table->string('sexe');
            $table->date('dateNaissance');
            $table->string('lieuNaissance');
            $table->string('adresse');
            $table->string('situation');
            $table->string('fonction');
            $table->string('image_profile');
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
        Schema::dropIfExists('travailleur');

    }
}
