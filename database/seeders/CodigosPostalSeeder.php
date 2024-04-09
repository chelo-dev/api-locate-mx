<?php

namespace Database\Seeders;

use App\Models\Codigo_Postal_Municipio;
use Illuminate\Database\Seeder;
use App\Models\Tipo_Comunidad;
use App\Models\Codigo_Postal;
use App\Models\Estado_Pais;
use App\Models\Municipio;
use App\Models\Colonia;

class CodigosPostalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        set_time_limit(0);

        /*
        |--------------------------------------------------------------------------
        | Importar archivo estados
        |--------------------------------------------------------------------------
        */

        $archivo = fopen(public_path('assets/administracion/catalogos/estados.csv'), 'r');
        while (($data = fgetcsv($archivo,1000,";")) !== false) {
            if ($data[0] != 'NOMBRE') {
                $estado = new Estado_Pais;
                $estado->nombre = $data[0];
                $estado->save();
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Importar archivo tipos de comunidades
        |--------------------------------------------------------------------------
        */

        $archivo = fopen(public_path('assets/administracion/catalogos/tipos_comunidad.csv'), 'r');
        while (($data = fgetcsv($archivo,1000,";")) !== false) {
            if ($data[0] != 'NOMBRE') {
                $tipo_colonia = new Tipo_Comunidad;
                $tipo_colonia->nombre = $data[0];
                $tipo_colonia->save();
            }
        }

        $tipo_colonia = new Tipo_Comunidad;
        $tipo_colonia->nombre = 'DESCONOCIDO';
        $tipo_colonia->save();

        $tipo_colonia = new Tipo_Comunidad;
        $tipo_colonia->nombre = 'RESERVA TERRITORIAL';
        $tipo_colonia->save();

        /*
        |--------------------------------------------------------------------------
        | Importar archivo codigos postales
        |--------------------------------------------------------------------------
        */

        $archivo = fopen(public_path('assets/administracion/catalogos/codigos_postales.csv'), 'r');
        while (($data = fgetcsv($archivo,1000,";")) !== false) {
            if ($data[0] != 'CODIGO') {
                $codigo_postal = new Codigo_Postal;
                $codigo_postal->codigo = $data[0];
                $codigo_postal->save();
            }
        }

        $codigo_postal = new Codigo_Postal;
        $codigo_postal->codigo = '00000';
        $codigo_postal->save();

        /*
        |--------------------------------------------------------------------------
        | Importar archivo municipios
        |--------------------------------------------------------------------------
        */

        $archivo = fopen(public_path('assets/administracion/catalogos/municipios.csv'), 'r');
        while (($data = fgetcsv($archivo,1000,";")) !== false) {
            if ($data[0] != 'NOMBRE') {
                $municipio = new Municipio;
                $municipio->nombre = $data[0];
                $municipio->estados_paises_id = $data[1];
                $municipio->save();
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Importar archivo codigos postales municipios
        |--------------------------------------------------------------------------
        */

        $archivo = fopen(public_path('assets/administracion/catalogos/codigos_postales_municipios.csv'), 'r');
        while (($data = fgetcsv($archivo,1000,";")) !== false) {
            if ($data[0] != 'MUNICIPIOS ID') {
                $codigo_postal_municipio = new Codigo_Postal_Municipio;
                $codigo_postal_municipio->municipios_id = $data[0];
                $codigo_postal_municipio->codigos_postales_id = $data[1];
                $codigo_postal_municipio->save();
            }
        }

        $codigo_postal_municipio = new Codigo_Postal_Municipio;
        $codigo_postal_municipio->municipios_id = 2471;
        $codigo_postal_municipio->codigos_postales_id = 31795;
        $codigo_postal_municipio->save();

        /*
        |--------------------------------------------------------------------------
        | Importar archivo colonias
        |--------------------------------------------------------------------------
        */

        $archivo = fopen(public_path('assets/administracion/catalogos/colonias.csv'), 'r');
        while (($data = fgetcsv($archivo,1000,";")) !== false) {
            if ($data[0] != 'NOMBRE') {
                $colonia = new Colonia;
                $colonia->nombre = $data[0];
                $colonia->tipos_comunidades_id = $data[1];
                $colonia->codigos_postales_municipios_id = $data[2];
                $colonia->save();
            }
        }

        $archivo = fopen(public_path('assets/administracion/catalogos/colonias_2.csv'), 'r');
        while (($data = fgetcsv($archivo,1000,";")) !== false) {
            if ($data[0] != 'NOMBRE') {
                $colonia = new Colonia;
                $colonia->nombre = $data[0];
                $colonia->tipos_comunidades_id = $data[1];
                $colonia->codigos_postales_municipios_id = $data[2];
                $colonia->save();
            }
        }

        $archivo = fopen(public_path('assets/administracion/catalogos/colonias_3.csv'), 'r');
        while (($data = fgetcsv($archivo,1000,";")) !== false) {
            if ($data[0] != 'NOMBRE') {
                $colonia = new Colonia;
                $colonia->nombre = $data[0];
                $colonia->tipos_comunidades_id = $data[1];
                $colonia->codigos_postales_municipios_id = $data[2];
                $colonia->save();
            }
        }

        $archivo = fopen(public_path('assets/administracion/catalogos/colonias_4.csv'), 'r');
        while (($data = fgetcsv($archivo,1000,";")) !== false) {
            if ($data[0] != 'NOMBRE') {
                $colonia = new Colonia;
                $colonia->nombre = $data[0];
                $colonia->tipos_comunidades_id = $data[1];
                $colonia->codigos_postales_municipios_id = $data[2];
                $colonia->save();
            }
        }

        $colonia = new Colonia;
        $colonia->nombre = 'DESCONOCIDO';
        $colonia->tipos_comunidades_id = 31;
        $colonia->codigos_postales_municipios_id = 31795;
        $colonia->save();
    }
}
