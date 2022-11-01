<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visites', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('travailleur_id');
            $table->date('dateVisite');
            $table->text('resultat');
            $table->text('recommendation');
            $table->timestamps();
            $table->foreign('travailleur_id')
              ->references('id')->on('travailleur')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visites');
    }
}
