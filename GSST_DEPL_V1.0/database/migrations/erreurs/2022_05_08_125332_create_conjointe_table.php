<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConjointeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 'travailleur_id',
        // 'type',
        // 'cin',
        // 'nom',
        // 'prenom',
        // 'tel',
        // 'email',
        Schema::create('conjointe', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('travailleur_id');
            $table->string('cin')->unique();
            $table->string('nom');
            $table->string('prenom');
            $table->string('type');
            $table->string('tel');
            $table->string('email');
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
        Schema::dropIfExists('conjointe');
    }
}
