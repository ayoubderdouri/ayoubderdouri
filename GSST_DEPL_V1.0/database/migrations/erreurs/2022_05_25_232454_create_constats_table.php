<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConstatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('constats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('audit_id');
            $table->string('type');
            $table->string('objet');
            $table->foreign('audit_id')
              ->references('id')->on('audits')->onDelete('cascade');
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
        Schema::dropIfExists('constats');
    }
}
