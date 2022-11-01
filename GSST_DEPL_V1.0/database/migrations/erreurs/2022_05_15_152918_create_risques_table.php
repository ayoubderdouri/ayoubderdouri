<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRisquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('risque', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('presence');
            $table->text('description');
            $table->string('priorite');
            $table->string('milieu');
            $table->string('activite');
            $table->double('duree');
            $table->double('frequence');
            $table->double('gravite');
            $table->double('coeffecient');
            $table->double('probabilite');
            $table->double('criticite');
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
        Schema::dropIfExists('risque');
    }
}
