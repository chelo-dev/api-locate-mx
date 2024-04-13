<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCodigosPostalesMunicipiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('codigos_postales_municipios', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->unsignedBigInteger('municipios_id');
            $table->unsignedBigInteger('codigos_postales_id');
            
            $table->timestamps();
            $table->foreign('municipios_id')->references('id')->on('municipios')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('codigos_postales_id')->references('id')->on('codigos_postales')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('codigos_postales_municipios');
    }
}
