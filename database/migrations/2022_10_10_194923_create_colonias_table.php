<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColoniasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colonias', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('nombre');
            $table->unsignedBigInteger('tipos_comunidades_id');
            $table->unsignedBigInteger('codigos_postales_municipios_id');
            
            $table->foreign('tipos_comunidades_id')->references('id')->on('tipos_comunidades')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('codigos_postales_municipios_id')->references('id')->on('codigos_postales_municipios')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('colonias');
    }
}
