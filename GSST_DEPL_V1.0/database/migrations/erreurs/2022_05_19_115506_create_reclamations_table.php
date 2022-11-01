<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReclamationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reclamation', function (Blueprint $table) {
            $table->id();
            $table->string('nom')->nullable();
            $table->string('prenom')->nullable();
            $table->date('date');
            $table->string('entite')->nullable();
            $table->string('email');
            $table->string('objet');
            $table->string('piece')->nullable();
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
        Schema::dropIfExists('reclamation');
    }
}
