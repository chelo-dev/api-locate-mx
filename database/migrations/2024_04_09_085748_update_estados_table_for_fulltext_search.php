<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class UpdateEstadosTableForFulltextSearch extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Asegúrate de que la tabla use InnoDB; esto es opcional ya que InnoDB es el predeterminado en MySQL 5.6+
        Schema::table('estados_paises', function (Blueprint $table) {
            DB::statement('ALTER TABLE estados_paises ENGINE = InnoDB');
        });

        // Agregar índice de texto completo
        Schema::table('estados_paises', function (Blueprint $table) {
            $table->fullText('nombre');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Eliminar el índice de texto completo
        Schema::table('estados', function (Blueprint $table) {
            $table->dropIndex(['nombre']);
        });
    }
}
