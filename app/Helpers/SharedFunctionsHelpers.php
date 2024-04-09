<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class SharedFunctionsHelpers
{
    /**
     * Enviar una respuesta de éxito en formato JSON.
     *
     * @param mixed $data
     * @param string $message
     * @param int $code
     * @return \Illuminate\Http\JsonResponse
     */
    public static function sendResponse($data, $message = '', $code = Response::HTTP_OK)
    {
        $response = [
            'success' => true,
            'data'    => $data,
            'message' => $message,
        ];

        return response()->json($response, $code);
    }

    /**
     * Enviar una respuesta de error en formato JSON.
     *
     * @param string $error
     * @param array $errorMessages
     * @param int $code
     * @return \Illuminate\Http\JsonResponse
     */
    public static function sendError($error, $errorMessages = [], $code = Response::HTTP_BAD_REQUEST)
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];

        if (!empty($errorMessages))
            $response['data'] = $errorMessages;

        return response()->json($response, $code);
    }

    public static function clearString($texto)
    {
        $texto = Str::ascii($texto);
        $texto = trim($texto);
        $texto = strtoupper($texto);

        return $texto;
    }

    public static function pathDocuments()
    {
        return 'documents/';
    }

    public static function getDataMessage()
    {
        return 'Datos recuperados con éxito';
    }

    public static function getDataMessageError()
    {
        return 'Error obtener informacion';
    }

    public static function messageRegisterSuccess()
    {
        return 'Se completó un registro con éxito.';
    }

    public static function messageRegisterError()
    {
        return 'Error al guardar los datos';
    }

    public static function messageDelete()
    {
        return 'Un registro fue eliminado con éxito.';
    }
}
