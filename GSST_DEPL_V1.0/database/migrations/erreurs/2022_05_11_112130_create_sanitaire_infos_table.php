<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanitaireInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SanitaireInfo', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('travailleur_id');
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
        Schema::dropIfExists('SanitaireInfo');
    }
}
