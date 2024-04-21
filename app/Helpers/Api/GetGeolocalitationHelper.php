<?php

namespace App\Helpers\Api;

use App\Helpers\SharedFunctionsHelpers;
use App\Models\Codigo_Postal_Municipio;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Colonia;

class GetGeolocalitationHelper
{
    public static function searchGeolocation($postalCode)
    {
        $codigoPostalMunicipio = Codigo_Postal_Municipio::with('municipio.estadoPais', 'codigoPostal', 'colonia.tipoComunidad')
            ->whereHas('codigoPostal', function ($query) use ($postalCode) {
                $query->where('codigo', $postalCode);
            })
            ->first();

        $data = [
            'municipio' => [
                'nombre' => $codigoPostalMunicipio->municipio->nombre,
                'estado_pais' => [
                    'nombre' => $codigoPostalMunicipio->municipio->estadoPais->nombre
                ]
            ],
            'codigo_postal' => [
                'codigo' => $codigoPostalMunicipio->codigoPostal->codigo
            ],
            'pais' => [
                'nombre' => 'MÉXICO',
                'abreviatura' => 'MX'
            ],
            'colonia' => [
                'nombre' => $codigoPostalMunicipio->colonia->nombre,
                'tipo_comunidad' => [
                    'nombre' => $codigoPostalMunicipio->colonia->tipoComunidad->nombre
                ]
            ]
        ];

        return $data;
    }

    public static function searchColonia($colonia)
    {
        $search = Colonia::with('tipoComunidad')
            ->where(DB::raw("LOWER(nombre)"), '=', self::normalize($colonia))
            ->first();

        $data = [
            'nombre' => $search->nombre,
            'tipo_comunidad' => [
                'nombre' => $search->tipoComunidad->nombre
            ]
        ];

        return $data;
    }

    public static function generatePdf($codigo_postal)
    {
        $codigoPostalMunicipio = Codigo_Postal_Municipio::with('municipio.estadoPais', 'codigoPostal', 'colonia.tipoComunidad')
            ->whereHas('codigoPostal', function ($query) use ($codigo_postal) {
                $query->where('codigo', $codigo_postal);
            })
            ->first();

        $data = [
            'municipio' => [
                'nombre' => $codigoPostalMunicipio->municipio->nombre,
                'estado_pais' => [
                    'nombre' => $codigoPostalMunicipio->municipio->estadoPais->nombre
                ]
            ],
            'codigo_postal' => [
                'codigo' => $codigoPostalMunicipio->codigoPostal->codigo
            ],
            'pais' => [
                'nombre' => 'MÉXICO',
                'abreviatura' => 'MX'
            ],
            'colonia' => [
                'nombre' => $codigoPostalMunicipio->colonia->nombre,
                'tipo_comunidad' => [
                    'nombre' => $codigoPostalMunicipio->colonia->tipoComunidad->nombre
                ]
            ]
        ];

        return $data;
    }

    public static function normalize($string)
    {
        $texto = Str::ascii($string);
        $texto = trim($texto);
        $texto = strtolower($texto);

        return $texto;
    }
}
