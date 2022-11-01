<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActionMaitrisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ActionMaitrise', function (Blueprint $table) {
            $table->id();
            $table->string('source1');
            $table->string('source2');
            $table->unsignedBigInteger('source_id');
            $table->string('actuel');
            $table->string('prevu');
            $table->date('enregistrer_at');
            $table->string('responsable');
            $table->string('date_recommande');
            $table->date('date_realisation')->nullable();
            $table->string('delay_realisation')->nullable();
            $table->string('efficacite')->nullable();
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
        Schema::dropIfExists('action_maitrise');
    }
}
