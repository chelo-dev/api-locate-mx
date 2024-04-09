<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BaseController extends Controller
{
    /*
    |----------------------------------------------------------------------------------------------------
    |   Funciones para envio de respuestas y datos para datatable.
    |----------------------------------------------------------------------------------------------------
    */

    public function enviarDatos($resultado)
    {

        return response()->json($resultado, 200);
    }

    public function enviarRespuesta($resultado, $mensaje)
    {
        $respuesta = [
            'respuesta' => true,
            'datos' => $resultado,
            'mensaje' => $mensaje,
        ];

        return response()->json($respuesta, 200);
    }

    public function enviarRespuestaEliminacion($datos, $mensaje)
    {
        $respuesta = [
            'respuesta' => false,
            'datos' => $datos,
            'mensaje' => $mensaje,
        ];

        return response()->json($respuesta, 200);
    }

    public function enviarError($mensaje, $error_mensajes = [], $codigo_error = 404)
    {
        $respuesta = [
            'respuesta' => false,
            'mensaje' => $mensaje,
        ];

        if (!empty($error_mensajes))
            $respuesta['error_mensaje'] = $error_mensajes;


        return response()->json($respuesta, $codigo_error);
    }
}
