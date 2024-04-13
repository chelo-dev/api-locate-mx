<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tokens', function (Blueprint $table) {
            $table->id();
            $table->uuid('token')->unique(); // Uuid para autenticar
            $table->dateTime('expiration_date')->nullable(); // Fecha de expiración del token
            $table->integer('max_requests')->nullable(); // Número máximo de peticiones
            $table->boolean('active')->default(true); // Estado del token (activo/inactivo)
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
        Schema::dropIfExists('tokens');
    }
}
